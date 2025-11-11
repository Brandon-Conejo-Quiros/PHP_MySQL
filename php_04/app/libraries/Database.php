<?php
class Database {
    private $host = db_Servidor;
    private $name = db_Basedato;
    private $user = db_Usuario;
    private $pass = db_Contra;

    private $dbh;   // database handler (conexion PDO)
    private $stmt;  // statement preparado
    private $error; // para guardar errores

    public function __construct() {
        // Cadena de conexión
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->name;

        // Opciones para PDO
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    // Prepara una consulta SQL
    public function query($sql) {
        $this->stmt = $this->dbh->prepare($sql);
    }

    // Vincula parámetros a la consulta
    public function bind($param, $value, $type = null) {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    // Ejecuta la consulta
    public function execute() {
        return $this->stmt->execute();
    }

    // Devuelve todos los resultados como objetos
    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Devuelve una sola fila como objeto
    public function singleRow() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
}
?>
