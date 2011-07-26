<?php

/**
 * This is the base class for Comments.
 * 
 * @see Comments, CoughObject
 **/
abstract class Comments_Generated extends CoughObject {
	
	protected static $db = null;
	protected static $dbName = 'isetimeline';
	protected static $tableName = 'comments';
	protected static $pkFieldNames = array('id');
	
	protected $fields = array(
		'id' => null,
		'event_id' => null,
		'timestamp' => "CURRENT_TIMESTAMP",
		'author' => null,
		'external_system_user' => null,
		'comment_body' => null,
	);
	
	protected $fieldDefinitions = array(
		'id' => array(
			'db_column_name' => 'id',
			'is_null_allowed' => false,
			'default_value' => null
		),
		'event_id' => array(
			'db_column_name' => 'event_id',
			'is_null_allowed' => true,
			'default_value' => null
		),
		'timestamp' => array(
			'db_column_name' => 'timestamp',
			'is_null_allowed' => false,
			'default_value' => "CURRENT_TIMESTAMP"
		),
		'author' => array(
			'db_column_name' => 'author',
			'is_null_allowed' => false,
			'default_value' => null
		),
		'external_system_user' => array(
			'db_column_name' => 'external_system_user',
			'is_null_allowed' => true,
			'default_value' => null
		),
		'comment_body' => array(
			'db_column_name' => 'comment_body',
			'is_null_allowed' => true,
			'default_value' => null
		),
	);
	
	protected $objectDefinitions = array(
		'Event_Object' => array(
			'class_name' => 'Event'
		),
	);
	
	// Static Definition Methods
	
	public static function getDb() {
		if (is_null(Comments::$db)) {
			Comments::$db = CoughDatabaseFactory::getDatabase(Comments::$dbName);
		}
		return Comments::$db;
	}
	
	public static function getDbName() {
		return CoughDatabaseFactory::getDatabaseName(Comments::$dbName);
	}
	
	public static function getTableName() {
		return Comments::$tableName;
	}
	
	public static function getPkFieldNames() {
		return Comments::$pkFieldNames;
	}
	
	// Static Construction (factory) Methods
	
	/**
	 * Constructs a new Comments object from
	 * a single id (for single key PKs) or a hash of [field_name] => [field_value].
	 * 
	 * The key is used to pull data from the database, and, if no data is found,
	 * null is returned. You can use this function with any unique keys or the
	 * primary key as long as a hash is used. If the primary key is a single
	 * field, you may pass its value in directly without using a hash.
	 * 
	 * @param mixed $idOrHash - id or hash of [field_name] => [field_value]
	 * @return mixed - Comments or null if no record found.
	 **/
	public static function constructByKey($idOrHash, $forPhp5Strict = '') {
		return CoughObject::constructByKey($idOrHash, 'Comments');
	}
	
	/**
	 * Constructs a new Comments object from custom SQL.
	 * 
	 * @param string $sql
	 * @return mixed - Comments or null if exactly one record could not be found.
	 **/
	public static function constructBySql($sql, $forPhp5Strict = '') {
		return CoughObject::constructBySql($sql, 'Comments');
	}
	
	/**
	 * Constructs a new Comments object after
	 * checking the fields array to make sure the appropriate subclass is
	 * used.
	 * 
	 * No queries are run against the database.
	 * 
	 * @param array $hash - hash of [field_name] => [field_value] pairs
	 * @return Comments
	 **/
	public static function constructByFields($hash) {
		return new Comments($hash);
	}
	
	public static function getLoadSql() {
		$tableName = Comments::getTableName();
		return '
			SELECT
				`' . $tableName . '`.*
			FROM
				`' . Comments::getDbName() . '`.`' . $tableName . '`
		';
	}
	
	// Generated attribute accessors (getters and setters)
	
	public function getId() {
		return $this->getField('id');
	}
	
	public function setId($value) {
		$this->setField('id', $value);
	}
	
	public function getEventId() {
		return $this->getField('event_id');
	}
	
	public function setEventId($value) {
		$this->setField('event_id', $value);
	}
	
	public function getTimestamp() {
		return $this->getField('timestamp');
	}
	
	public function setTimestamp($value) {
		$this->setField('timestamp', $value);
	}
	
	public function getAuthor() {
		return $this->getField('author');
	}
	
	public function setAuthor($value) {
		$this->setField('author', $value);
	}
	
	public function getExternalSystemUser() {
		return $this->getField('external_system_user');
	}
	
	public function setExternalSystemUser($value) {
		$this->setField('external_system_user', $value);
	}
	
	public function getCommentBody() {
		return $this->getField('comment_body');
	}
	
	public function setCommentBody($value) {
		$this->setField('comment_body', $value);
	}
	
	// Generated one-to-one accessors (loaders, getters, and setters)
	
	public function loadEvent_Object() {
		$this->setEvent_Object(Event::constructByKey($this->getEventId()));
	}
	
	public function getEvent_Object() {
		if (!isset($this->objects['Event_Object'])) {
			$this->loadEvent_Object();
		}
		return $this->objects['Event_Object'];
	}
	
	public function setEvent_Object($event) {
		$this->objects['Event_Object'] = $event;
	}
	
	// Generated one-to-many collection loaders, getters, setters, adders, and removers
	
}

?>