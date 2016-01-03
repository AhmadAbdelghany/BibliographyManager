<?php

class Model
{
    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /**
     * Get all songs from database
     */
    public function getAllSongs()
    {
        $sql = "SELECT id, artist, track, link FROM song";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    /**
     * Add a song to database
     * TODO put this explanation into readme and remove it from here
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $artist Artist
     * @param string $track Track
     * @param string $link Link
     */
    public function addSong($artist, $track, $link)
    {
        $sql = "INSERT INTO song (artist, track, link) VALUES (:artist, :track, :link)";
        $query = $this->db->prepare($sql);
        $parameters = array(':artist' => $artist, ':track' => $track, ':link' => $link);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Delete a song in the database
     * Please note: this is just an example! In a real application you would not simply let everybody
     * add/update/delete stuff!
     * @param int $song_id Id of song
     */
    public function deleteSong($song_id)
    {
        $sql = "DELETE FROM song WHERE id = :song_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':song_id' => $song_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get a song from database
     */
    public function getSong($song_id)
    {
        $sql = "SELECT id, artist, track, link FROM song WHERE id = :song_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':song_id' => $song_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return $query->fetch();
    }

    /**
     * Update a song in database
     * // TODO put this explaination into readme and remove it from here
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $artist Artist
     * @param string $track Track
     * @param string $link Link
     * @param int $song_id Id
     */
    public function updateSong($artist, $track, $link, $song_id)
    {
        $sql = "UPDATE song SET artist = :artist, track = :track, link = :link WHERE id = :song_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':artist' => $artist, ':track' => $track, ':link' => $link, ':song_id' => $song_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get simple "stats". This is just a simple demo to show
     * how to use more than one model in a controller (see application/controller/songs.php for more)
     */
    public function getAmountOfSongs()
    {
        $sql = "SELECT COUNT(id) AS amount_of_songs FROM song";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetch() is the PDO method that get exactly one result
        return $query->fetch()->amount_of_songs;
    }
    
    public function authenticate($email, $password) {
    	$sql = "SELECT * FROM user WHERE email = :email AND password = :password LIMIT 1";
    	$query = $this->db->prepare($sql);
    	$parameters = array(':email' => $email, ':password' => $password);
    	$query->execute($parameters);
    	return $query->fetch();
    }
    
    public function addUser($firstName, $lastName, $email, $password) {
    	$sql = "INSERT INTO user (firstname, surname, email, password) VALUES (:firstName, :lastName, :email, :password)";
    	$query = $this->db->prepare($sql);
    	$parameters = array(':firstName' => $firstName,':lastName' => $lastName, ':email' => $email, ':password' => $password);
    	// echo '[ PDO DEBUG ]: ' . debugPDO($sql, $parameters);  exit();
    	$query->execute($parameters);
    	return $this->db->lastInsertId();
    }
    
    public function addLibrary($userId, $libName, $isSysLib) {
    	$newLibId = $this->createLibrary($libName, $isSysLib);
    	$this->addPrivilege($userId, $newLibId, 1);
    }
    
    private function createLibrary($libName, $isSysLib) {
    	$sql = "INSERT INTO library (name, isSysLib) VALUES (:name, :isSysLib)";
    	$query = $this->db->prepare($sql);
    	$parameters = array(':name' => $libName, ':isSysLib' => $isSysLib);
    	$query->execute($parameters);
    	return $this->db->lastInsertId();
    }
    
    public function addPrivilege($userId, $libId, $isOwner) {
    	$sql = "INSERT INTO user_priv (userId, libId, isOwner) VALUES (:userId, :libId ,:isOwner)";
    	$query = $this->db->prepare($sql);
    	$parameters = array(':userId' => $userId, ':libId' => $libId, ':isOwner' => $isOwner);
    	$query->execute($parameters);
    }
    
    public function getUnfiled($userId) {
    	$sql = "SELECT * FROM library 
    			JOIN user_priv 
    			ON library.id = user_priv.libId 
    			WHERE name = 'Unfiled' 
    			AND user_priv.userId = :userId 
    			LIMIT 1";
    	$query = $this->db->prepare($sql);
    	$parameters = array(':userId' => $userId);
    	$query->execute($parameters);
    	return $query->fetch();
    }
    public function getTrash($userId) {
    	$sql = "SELECT * FROM library
    			JOIN user_priv
    			ON library.id = user_priv.libId
    			WHERE name = 'Trash'
    			AND user_priv.userId = :userId
    			LIMIT 1";
    	$query = $this->db->prepare($sql);
    	$parameters = array(':userId' => $userId);
    	$query->execute($parameters);
    	return $query->fetch();
    }
    public function getOwnedLibs($userId) {
    	$sql = "SELECT * FROM library
    			JOIN user_priv
    			ON library.id = user_priv.libId
    			WHERE user_priv.userId = :userId
    			AND library.isSysLib = 0 
    			AND user_priv.isOwner = 1";
    	$query = $this->db->prepare($sql);
    	$parameters = array(':userId' => $userId);
    	$query->execute($parameters);
    	return $query->fetchAll();
    }
    public function getSharedLibs($userId) {
    	$sql = "SELECT * FROM library
    			JOIN user_priv
    			ON library.id = user_priv.libId
    			WHERE user_priv.userId = :userId
    			AND user_priv.isOwner = 0";
    	$query = $this->db->prepare($sql);
    	$parameters = array(':userId' => $userId);
    	$query->execute($parameters);
    	return $query->fetchAll();
    }
    
    public function getLibrary($libId) {
    	$sql = "SELECT * FROM library 
    			WHERE id = :libId 
    			LIMIT 1";
    	$query = $this->db->prepare($sql);
    	$parameters = array(':libId' => $libId);
    	$query->execute($parameters);
    	return $query->fetch();
    }
    
    public function addReference($author, $title, $journal, $publishDate, $libId) {
    	$sql = "INSERT INTO reference (author, title, journal, publishDate, libId) 
    			VALUES (:author, :title, :journal, :publishDate, :libId)";
    	$query = $this->db->prepare($sql);
    	$parameters = array(
    			':author' => $author,
    			':title' => $title,
    			':journal' => $journal,
    			':publishDate' => $publishDate,
    			':libId' => $libId			
    	);
    	$query->execute($parameters);
    	return $this->db->lastInsertId();
    }
    
    public function getReferences($libId) {
    	$sql = "SELECT * FROM reference
    			WHERE libId = :libId";
    	$query = $this->db->prepare($sql);
    	$parameters = array(':libId' => $libId);
    	$query->execute($parameters);
    	return $query->fetchAll();
    }
	
    public function getViewers($libId) {
    	$sql = "SELECT * FROM user
    			JOIN user_priv
    			ON user.id = user_priv.userId
    			WHERE user_priv.libId = :libId
    			AND user_priv.isOwner = 0";
    	$query = $this->db->prepare($sql);
    	$parameters = array(':libId' => $libId);
    	$query->execute($parameters);
    	return $query->fetchAll();
    }
    
    public function getUserByEmail($email) {
    	$sql = "SELECT * FROM user
    			WHERE email = :email
    			LIMIT 1";
    	$query = $this->db->prepare($sql);
    	$parameters = array(':email' => $email);
    	$query->execute($parameters);
    	return $query->fetch();
    }
    
    public function deletePrivilege($userId, $libId, $isOwner) {
    	$sql = "DELETE FROM user_priv WHERE userId=:userId AND libId=:libId";
    	$query = $this->db->prepare($sql);
    	$parameters = array(':userId' => $userId, ':libId' => $libId);
    	$query->execute($parameters);
    }
    
    public function renameLibrary($libId, $newName) {
    	$sql = "UPDATE library SET name = :newName WHERE id = :libId";
    	$query = $this->db->prepare($sql);
    	$parameters = array(':newName' => $newName, ':libId' => $libId);    
    	$query->execute($parameters);
    }
    
    public function getRegerenceById($refId) {
    	$sql = "SELECT * FROM reference
    			WHERE id = :refId
    			LIMIT 1";
    	$query = $this->db->prepare($sql);
    	$parameters = array(':refId' => $refId);
    	$query->execute($parameters);
    	return $query->fetch();
    }
    
    public function updateReference($author, $title, $journal, $publishDate, $refId) {
    	$sql = "UPDATE reference SET author = :author, title = :title, journal = :journal, publishDate= :publishDate 
    			WHERE id = :refId";
    	$query = $this->db->prepare($sql);
    	$parameters = array(
    			':author' => $author,
    			':title' => $title,
    			':journal' => $journal,
    			':publishDate' => $publishDate,
    			':refId' => $refId
    	);
    	$query->execute($parameters);
    	   
    }
    
    public function moveToTrash($refId, $trashId) {
    	$sql = "UPDATE reference SET libId = :trashId
    			WHERE id = :refId";
    	$query = $this->db->prepare($sql);
    	$parameters = array(
    			':trashId' => $trashId,
    			':refId' => $refId
    	);
    	$query->execute($parameters);
    
    }
    
    public function emptyTrash($trashId)
    {
    	$sql = "DELETE FROM reference WHERE libId = :trashId";
    	$query = $this->db->prepare($sql);
    	$parameters = array(':trashId' => $trashId);
    	$query->execute($parameters);
    }
    
    public function updateProfile($userId, $firstName, $surname, $email) {
    	$sql = "UPDATE user SET firstname = :firstname, surname = :surname, email = :email 
    			WHERE id = :userId";
    	$query = $this->db->prepare($sql);
    	$parameters = array(
    			':firstname' => $firstName,
    			':surname' => $surname,
    			':email' => $email,
    			':userId' => $userId
    	);
    	$query->execute($parameters);
    
    }
    
    public function getUserById($userId) {
    	$sql = "SELECT * FROM user
    			WHERE id = :userId
    			LIMIT 1";
    	$query = $this->db->prepare($sql);
    	$parameters = array(':userId' => $userId);
    	$query->execute($parameters);
    	return $query->fetch();
    }
    
    public function isOwner($userId, $libId) {
    	$sql = "SELECT count(*) AS num FROM user_priv WHERE userId=:userId AND libId=:libId";
    	$query = $this->db->prepare($sql);
    	$parameters = array(':userId' => $userId, ':libId' => $libId);
    	$query->execute($parameters);
    	return $query->fetch()->num == 1;
    }
    
}
