<?php

/**
 * This is the base class for Event.
 * 
 * @see Event, CoughObject
 **/
abstract class Event_Generated extends CoughObject {
	
	protected static $db = null;
	protected static $dbName = 'isetimeline';
	protected static $tableName = 'event';
	protected static $pkFieldNames = array('id');
	
	protected $fields = array(
		'id' => null,
		'short_title' => null,
		'resource_title' => null,
		'category' => null,
		'record_type' => null,
		'description' => null,
		'contributor' => null,
		'creator' => null,
		'start_date' => null,
		'end_date' => null,
		'nsf_award_number' => null,
		'pi' => null,
		'funding_source' => null,
		'uri' => null,
		'image' => null,
		'geo_coords' => null,
		'access_inclusion' => null,
		'zipcode' => null,
	);
	
	protected $fieldDefinitions = array(
		'id' => array(
			'db_column_name' => 'id',
			'is_null_allowed' => false,
			'default_value' => null
		),
		'short_title' => array(
			'db_column_name' => 'short_title',
			'is_null_allowed' => true,
			'default_value' => null
		),
		'resource_title' => array(
			'db_column_name' => 'resource_title',
			'is_null_allowed' => false,
			'default_value' => null
		),
		'category' => array(
			'db_column_name' => 'category',
			'is_null_allowed' => true,
			'default_value' => null
		),
		'record_type' => array(
			'db_column_name' => 'record_type',
			'is_null_allowed' => true,
			'default_value' => null
		),
		'description' => array(
			'db_column_name' => 'description',
			'is_null_allowed' => true,
			'default_value' => null
		),
		'contributor' => array(
			'db_column_name' => 'contributor',
			'is_null_allowed' => true,
			'default_value' => null
		),
		'creator' => array(
			'db_column_name' => 'creator',
			'is_null_allowed' => true,
			'default_value' => null
		),
		'start_date' => array(
			'db_column_name' => 'start_date',
			'is_null_allowed' => false,
			'default_value' => null
		),
		'end_date' => array(
			'db_column_name' => 'end_date',
			'is_null_allowed' => true,
			'default_value' => null
		),
		'nsf_award_number' => array(
			'db_column_name' => 'nsf_award_number',
			'is_null_allowed' => true,
			'default_value' => null
		),
		'pi' => array(
			'db_column_name' => 'pi',
			'is_null_allowed' => true,
			'default_value' => null
		),
		'funding_source' => array(
			'db_column_name' => 'funding_source',
			'is_null_allowed' => true,
			'default_value' => null
		),
		'uri' => array(
			'db_column_name' => 'uri',
			'is_null_allowed' => true,
			'default_value' => null
		),
		'image' => array(
			'db_column_name' => 'image',
			'is_null_allowed' => true,
			'default_value' => null
		),
		'geo_coords' => array(
			'db_column_name' => 'geo_coords',
			'is_null_allowed' => true,
			'default_value' => null
		),
		'access_inclusion' => array(
			'db_column_name' => 'access_inclusion',
			'is_null_allowed' => true,
			'default_value' => null
		),
		'zipcode' => array(
			'db_column_name' => 'zipcode',
			'is_null_allowed' => true,
			'default_value' => null
		),
	);
	
	protected $objectDefinitions = array();
	
	// Static Definition Methods
	
	public static function getDb() {
		if (is_null(Event::$db)) {
			Event::$db = CoughDatabaseFactory::getDatabase(Event::$dbName);
		}
		return Event::$db;
	}
	
	public static function getDbName() {
		return CoughDatabaseFactory::getDatabaseName(Event::$dbName);
	}
	
	public static function getTableName() {
		return Event::$tableName;
	}
	
	public static function getPkFieldNames() {
		return Event::$pkFieldNames;
	}
	
	// Static Construction (factory) Methods
	
	/**
	 * Constructs a new Event object from
	 * a single id (for single key PKs) or a hash of [field_name] => [field_value].
	 * 
	 * The key is used to pull data from the database, and, if no data is found,
	 * null is returned. You can use this function with any unique keys or the
	 * primary key as long as a hash is used. If the primary key is a single
	 * field, you may pass its value in directly without using a hash.
	 * 
	 * @param mixed $idOrHash - id or hash of [field_name] => [field_value]
	 * @return mixed - Event or null if no record found.
	 **/
	public static function constructByKey($idOrHash, $forPhp5Strict = '') {
		return CoughObject::constructByKey($idOrHash, 'Event');
	}
	
	/**
	 * Constructs a new Event object from custom SQL.
	 * 
	 * @param string $sql
	 * @return mixed - Event or null if exactly one record could not be found.
	 **/
	public static function constructBySql($sql, $forPhp5Strict = '') {
		return CoughObject::constructBySql($sql, 'Event');
	}
	
	/**
	 * Constructs a new Event object after
	 * checking the fields array to make sure the appropriate subclass is
	 * used.
	 * 
	 * No queries are run against the database.
	 * 
	 * @param array $hash - hash of [field_name] => [field_value] pairs
	 * @return Event
	 **/
	public static function constructByFields($hash) {
		return new Event($hash);
	}
	
	public function notifyChildrenOfKeyChange(array $key) {
		foreach ($this->getComments_Collection() as $comments) {
			$comments->setEventId($key['id']);
		}
		foreach ($this->getStories_Collection() as $stories) {
			$stories->setEventId($key['id']);
		}
	}
	
	public static function getLoadSql() {
		$tableName = Event::getTableName();
		return '
			SELECT
				`' . $tableName . '`.*
			FROM
				`' . Event::getDbName() . '`.`' . $tableName . '`
		';
	}
	
	// Generated attribute accessors (getters and setters)
	
	public function getId() {
		return $this->getField('id');
	}
	
	public function setId($value) {
		$this->setField('id', $value);
	}
	
	public function getShortTitle() {
		return $this->getField('short_title');
	}
	
	public function setShortTitle($value) {
		$this->setField('short_title', $value);
	}
	
	public function getResourceTitle() {
		return $this->getField('resource_title');
	}
	
	public function setResourceTitle($value) {
		$this->setField('resource_title', $value);
	}
	
	public function getCategory() {
		return $this->getField('category');
	}
	
	public function setCategory($value) {
		$this->setField('category', $value);
	}
	
	public function getRecordType() {
		return $this->getField('record_type');
	}
	
	public function setRecordType($value) {
		$this->setField('record_type', $value);
	}
	
	public function getDescription() {
		return $this->getField('description');
	}
	
	public function setDescription($value) {
		$this->setField('description', $value);
	}
	
	public function getContributor() {
		return $this->getField('contributor');
	}
	
	public function setContributor($value) {
		$this->setField('contributor', $value);
	}
	
	public function getCreator() {
		return $this->getField('creator');
	}
	
	public function setCreator($value) {
		$this->setField('creator', $value);
	}
	
	public function getStartDate() {
		return $this->getField('start_date');
	}
	
	public function setStartDate($value) {
		$this->setField('start_date', $value);
	}
	
	public function getEndDate() {
		return $this->getField('end_date');
	}
	
	public function setEndDate($value) {
		$this->setField('end_date', $value);
	}
	
	public function getNsfAwardNumber() {
		return $this->getField('nsf_award_number');
	}
	
	public function setNsfAwardNumber($value) {
		$this->setField('nsf_award_number', $value);
	}
	
	public function getPi() {
		return $this->getField('pi');
	}
	
	public function setPi($value) {
		$this->setField('pi', $value);
	}
	
	public function getFundingSource() {
		return $this->getField('funding_source');
	}
	
	public function setFundingSource($value) {
		$this->setField('funding_source', $value);
	}
	
	public function getUri() {
		return $this->getField('uri');
	}
	
	public function setUri($value) {
		$this->setField('uri', $value);
	}
	
	public function getImage() {
		return $this->getField('image');
	}
	
	public function setImage($value) {
		$this->setField('image', $value);
	}
	
	public function getGeoCoords() {
		return $this->getField('geo_coords');
	}
	
	public function setGeoCoords($value) {
		$this->setField('geo_coords', $value);
	}
	
	public function getAccessInclusion() {
		return $this->getField('access_inclusion');
	}
	
	public function setAccessInclusion($value) {
		$this->setField('access_inclusion', $value);
	}
	
	public function getZipcode() {
		return $this->getField('zipcode');
	}
	
	public function setZipcode($value) {
		$this->setField('zipcode', $value);
	}
	
	// Generated one-to-one accessors (loaders, getters, and setters)
	
	// Generated one-to-many collection loaders, getters, setters, adders, and removers
	
	public function loadComments_Collection() {
		
		// Always create the collection
		$collection = new Comments_Collection();
		$this->setComments_Collection($collection);
		
		// But only populate it if we have key ID
		if ($this->hasKeyId()) {
			$db = Comments::getDb();
			$tableName = Comments::getTableName();
			$sql = '
				SELECT
					`' . $tableName . '`.*
				FROM
					`' . Comments::getDbName() . '`.`' . $tableName . '`
				WHERE
					`' . $tableName . '`.`event_id` = ' . $db->quote($this->getId()) . '
			';

			// Construct and populate the collection
			$collection->loadBySql($sql);
			foreach ($collection as $element) {
				$element->setEvent_Object($this);
			}
		}
	}
	
	public function getComments_Collection() {
		if (!isset($this->collections['Comments_Collection'])) {
			$this->loadComments_Collection();
		}
		return $this->collections['Comments_Collection'];
	}
	
	public function setComments_Collection($commentsCollection) {
		$this->collections['Comments_Collection'] = $commentsCollection;
	}
	
	public function addComments(Comments $object) {
		$object->setEventId($this->getId());
		$object->setEvent_Object($this);
		$this->getComments_Collection()->add($object);
		return $object;
	}
	
	public function removeComments($objectOrId) {
		$removedObject = $this->getComments_Collection()->remove($objectOrId);
		if (is_object($removedObject)) {
			$removedObject->setEventId(null);
			$removedObject->setEvent_Object(null);
		}
		return $removedObject;
	}
	
	public function loadStories_Collection() {
		
		// Always create the collection
		$collection = new Stories_Collection();
		$this->setStories_Collection($collection);
		
		// But only populate it if we have key ID
		if ($this->hasKeyId()) {
			$db = Stories::getDb();
			$tableName = Stories::getTableName();
			$sql = '
				SELECT
					`' . $tableName . '`.*
				FROM
					`' . Stories::getDbName() . '`.`' . $tableName . '`
				WHERE
					`' . $tableName . '`.`event_id` = ' . $db->quote($this->getId()) . '
			';

			// Construct and populate the collection
			$collection->loadBySql($sql);
			foreach ($collection as $element) {
				$element->setEvent_Object($this);
			}
		}
	}
	
	public function getStories_Collection() {
		if (!isset($this->collections['Stories_Collection'])) {
			$this->loadStories_Collection();
		}
		return $this->collections['Stories_Collection'];
	}
	
	public function setStories_Collection($storiesCollection) {
		$this->collections['Stories_Collection'] = $storiesCollection;
	}
	
	public function addStories(Stories $object) {
		$object->setEventId($this->getId());
		$object->setEvent_Object($this);
		$this->getStories_Collection()->add($object);
		return $object;
	}
	
	public function removeStories($objectOrId) {
		$removedObject = $this->getStories_Collection()->remove($objectOrId);
		if (is_object($removedObject)) {
			$removedObject->setEventId(null);
			$removedObject->setEvent_Object(null);
		}
		return $removedObject;
	}
	
}

?>