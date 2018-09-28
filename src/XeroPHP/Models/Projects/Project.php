<?php
namespace XeroPHP\Models\Projects;

use XeroPHP\Remote;
use XeroPHP\Models\Accounting\Contact;

class Project extends Remote\Model
{

    /**
     * Get the resource uri of the class (Contacts) etc
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'projects';
    }


    /**
     * Get the root node name.  Just the unqualified classname
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'Projects';
    }


    /**
     * Get the guid property
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'projectId';
    }


    /**
     * Get the stem of the API (core.xro) etc
     *
     * @return string|null
     */
    public static function getAPIStem()
    {
        return Remote\URL::API_PROJECT;
    }


    /**
     * Get the supported methods
     */
    public static function getSupportedMethods()
    {
        return [
            Remote\Request::METHOD_GET,
            Remote\Request::METHOD_POST,
            Remote\Request::METHOD_DELETE
        ];
    }

    /**
     *
     * Get the properties of the object.  Indexed by constants
     *  [0] - Mandatory
     *  [1] - Type
     *  [2] - PHP type
     *  [3] - Is an Array
     *  [4] - Saves directly
     *
     * @return array
     */
    public static function getProperties()
    {
        return [
            'contactId' => [true, self::PROPERTY_TYPE_OBJECT, 'Contact', false, false],
            'name' => [true, self::PROPERTY_TYPE_STRING, null, false, false]
        ];
    }

    public static function isPageable()
    {
        return true;
    }

    /**
     * @return Contact
     */
    public function getContact()
    {
        return $this->_data['contactId'];
    }

    /**
     * @param Contact $value
     * @return Invoice
     */
    public function setContact(Contact $value)
    {
        $this->propertyUpdated('contactId', $value);
        $this->_data['contactId'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_data['name'];
    }

    /**
     * @param string $value
     * @return File
     */
    public function setName($value)
    {
        $this->propertyUpdated('name', $value);
        $this->_data['name'] = $value;
        return $this;
    }
}
