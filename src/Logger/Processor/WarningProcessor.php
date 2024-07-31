<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Logger\Processor;

use Jtl\Connector\Core\Rpc\Warnings;
use Monolog\LogRecord;
use Monolog\Processor\ProcessorInterface;

class WarningProcessor implements ProcessorInterface
{
    public const SEND_TO_WAWI = 'sendToWawi';

    private Warnings $warnings;
    /**
     * WarningProcessor constructor.
     */
    public function __construct(Warnings $warnings)
    {
        $this->warnings = $warnings;
    }


    /**
     * multiple param and return types are needed because some connectors use an older version of monolog
     * @template T of array{message:string,context:array<mixed>}|LogRecord
     * @param T $record
     *
     * @return T
     */
    public function __invoke(array|LogRecord $record): array|LogRecord
    {
        if (isset($record['context'][self::SEND_TO_WAWI]) && $record['context'][self::SEND_TO_WAWI] === false) {
            return $record;
        }

        $this->warnings->addWarning($record['message']);
        return $record;
    }
}