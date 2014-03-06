jtl\Connector\Feature\Group\Base
===============

Basic group class.




* Class name: Base
* Namespace: jtl\Connector\Feature\Group
* This is an **abstract** class
* Parent class: [jtl\Connector\Feature\Base\Base](jtl-Connector-Feature-Base-Base.md)
* This class implements: [jtl\Connector\Feature\Group\IGroup](jtl-Connector-Feature-Group-IGroup.md)




Properties
----------


### $_children

```
protected array $_children
```





* Visibility: **protected**


### $_name

```
protected string $_name
```





* Visibility: **protected**
* This property is defined by [jtl\Connector\Feature\Base\Base](jtl-Connector-Feature-Base-Base.md)


### $_classes

```
protected mixed $_classes
```





* Visibility: **protected**
* This property is defined by [jtl\Connector\Feature\Base\Base](jtl-Connector-Feature-Base-Base.md)


Methods
-------


### \jtl\Connector\Feature\Group\Base::addChildren()

```
mixed jtl\Connector\Feature\Group\Base::\jtl\Connector\Feature\Group\Base::addChildren()(mixed $children)
```

Adds a children to the group.



* Visibility: **public**

#### Arguments

* $children **mixed** - &lt;p&gt;A children of a group.&lt;/p&gt;



### \jtl\Connector\Feature\Group\Base::getChildrens()

```
array jtl\Connector\Feature\Group\Base::\jtl\Connector\Feature\Group\Base::getChildrens()()
```

Returns all children as array.



* Visibility: **public**



### \jtl\Connector\Feature\Group\Base::hasChildren()

```
boolean jtl\Connector\Feature\Group\Base::\jtl\Connector\Feature\Group\Base::hasChildren()()
```

Returns if the Group has children.



* Visibility: **public**



### \jtl\Connector\Feature\Base\Base::getName()

```
string jtl\Connector\Feature\Base\Base::\jtl\Connector\Feature\Base\Base::getName()()
```

Returns the name.



* Visibility: **public**
* This method is defined by [jtl\Connector\Feature\Base\Base](jtl-Connector-Feature-Base-Base.md)



### \jtl\Connector\Feature\Base\Base::setName()

```
boolean jtl\Connector\Feature\Base\Base::\jtl\Connector\Feature\Base\Base::setName()(string $name)
```

Sets the name.



* Visibility: **public**
* This method is defined by [jtl\Connector\Feature\Base\Base](jtl-Connector-Feature-Base-Base.md)

#### Arguments

* $name **string**



### \jtl\Connector\Feature\Base\Base::getClasses()

```
array jtl\Connector\Feature\Base\Base::\jtl\Connector\Feature\Base\Base::getClasses()()
```

Returns all declared classes.

We need this way, because the autoloader will try to include the class
file if we use "class_exists" or similar functions.

* Visibility: **public**
* This method is defined by [jtl\Connector\Feature\Base\Base](jtl-Connector-Feature-Base-Base.md)

