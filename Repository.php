<?php
 include_once "autoloader.php"; 
abstract class Repositroy implements IRepository
{
    protected $db;
    public function __construct(protected $tableName)
    {
        $this->db = ConnexionBD::getInstance();
    }
    public function findAll()
    {
        $query = "SELECT * from {$this->tableName}";
        /* Un objet de type Mysql non utilisable */
        $response = $this->db->query($query);
        /* Je veux le transformer en un tableau d'enregistrement */
        $elements = $response->fetchAll(PDO::FETCH_OBJ);
        return $elements;
    }
    public function findById($id)
    {
        $query = "SELECT * from {$this->tableName} where id = :id";
        /* Un objet de type Mysql non utilisable */
        $response = $this->db->prepare($query);
        $response->execute(['id' => $id]);
        /* Je veux le transformer en un tableau d'enregistrement */
        return $response->fetch(PDO::FETCH_ASSOC);
    }
    public function delete($id)
    {
        $query = "delete * from {$this->tableName} where id = :id";
        /* Un objet de type Mysql non utilisable */
        $response = $this->db->prepare($query);
        $response->execute(['id' => $id]);
    }
    public function create($params)
    {
        $keys = array_keys($params);
        //        ['username', 'password','role']
        $keyString = implode(",", $keys);
        //        'username', 'password','role'
        //        ['?', '?', '?']
        $paramselements = array_fill(0, count($keys), '?');
        $paramString = implode(",", $paramselements);
        $request = "INSERT INTO $this->tableName (`id`, $keyString) VALUES (NULL, $paramString);";
        $reponse = $this->db->prepare($request);
        $reponse->execute(array_values($params));
        return $reponse->fetch(PDO::FETCH_OBJ);
        /*
            ['name' => 'sellaouti', 'age' =>42, 'job' => 'teacher' ]
        */
        /*
        Output 
        INSERT INTO $tableName 
        (`col1`, `updated_at`, `deleted_at`, `version`, `id`, `name`, `age`, `job`, `path`, `userId`) 
        VALUES 
        (?, ?, NULL, '', 'c7221fa4-fa9b-11ef-8983-c4cbe1171aca', 'aymen', '42', 'teacher', '', NULL); 
        */
    }
}