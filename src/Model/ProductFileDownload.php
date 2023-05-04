<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * @access     public
 * @package    Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ProductFileDownload extends AbstractModel
{
    /**
     * @var \DateTimeInterface|null
     * @Serializer\Type("DateTimeInterface")
     * @Serializer\SerializedName("creationDate")
     * @Serializer\Accessor(getter="getCreationDate",setter="setCreationDate")
     */
    protected ?\DateTimeInterface $creationDate = null;

    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("maxDays")
     * @Serializer\Accessor(getter="getMaxDays",setter="setMaxDays")
     */
    protected int $maxDays = 0;

    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("maxDownloads")
     * @Serializer\Accessor(getter="getMaxDownloads",setter="setMaxDownloads")
     */
    protected int $maxDownloads = 0;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("path")
     * @Serializer\Accessor(getter="getPath",setter="setPath")
     */
    protected string $path = '';

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("previewPath")
     * @Serializer\Accessor(getter="getPreviewPath",setter="setPreviewPath")
     */
    protected string $previewPath = '';

    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("sort")
     * @Serializer\Accessor(getter="getSort",setter="setSort")
     */
    protected int $sort = 0;

    /**
     * @var ProductFileDownloadI18n[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\ProductFileDownloadI18n>")
     * @Serializer\SerializedName("i18ns")
     * @Serializer\AccessType("reflection")
     */
    protected array $i18ns = [];

    /**
     * @return \DateTimeInterface
     */
    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }

    /**
     * @param \DateTimeInterface $creationDate
     *
     * @return ProductFileDownload
     */
    public function setCreationDate(\DateTimeInterface $creationDate = null): ProductFileDownload
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * @return integer
     */
    public function getMaxDays(): int
    {
        return $this->maxDays;
    }

    /**
     * @param integer $maxDays
     *
     * @return ProductFileDownload
     */
    public function setMaxDays(int $maxDays): ProductFileDownload
    {
        $this->maxDays = $maxDays;

        return $this;
    }

    /**
     * @return integer
     */
    public function getMaxDownloads(): int
    {
        return $this->maxDownloads;
    }

    /**
     * @param integer $maxDownloads
     *
     * @return ProductFileDownload
     */
    public function setMaxDownloads(int $maxDownloads): ProductFileDownload
    {
        $this->maxDownloads = $maxDownloads;

        return $this;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     *
     * @return ProductFileDownload
     */
    public function setPath(string $path): ProductFileDownload
    {
        $this->path = $path;

        return $this;
    }

    /**
     * @return string
     */
    public function getPreviewPath(): string
    {
        return $this->previewPath;
    }

    /**
     * @param string $previewPath
     *
     * @return ProductFileDownload
     */
    public function setPreviewPath(string $previewPath): ProductFileDownload
    {
        $this->previewPath = $previewPath;

        return $this;
    }

    /**
     * @return integer
     */
    public function getSort(): int
    {
        return $this->sort;
    }

    /**
     * @param integer $sort
     *
     * @return ProductFileDownload
     */
    public function setSort(int $sort): ProductFileDownload
    {
        $this->sort = $sort;

        return $this;
    }

    /**
     * @param ProductFileDownloadI18n $i18n
     *
     * @return ProductFileDownload
     */
    public function addI18n(ProductFileDownloadI18n $i18n): ProductFileDownload
    {
        $this->i18ns[] = $i18n;

        return $this;
    }

    /**
     * @return ProductFileDownloadI18n[]
     */
    public function getI18ns(): array
    {
        return $this->i18ns;
    }

    /**
     * @param ProductFileDownloadI18n ...$i18ns
     *
     * @return ProductFileDownload
     */
    public function setI18ns(ProductFileDownloadI18n ...$i18ns): ProductFileDownload
    {
        $this->i18ns = $i18ns;

        return $this;
    }

    /**
     * @return ProductFileDownload
     */
    public function clearI18ns(): ProductFileDownload
    {
        $this->i18ns = [];

        return $this;
    }
}
