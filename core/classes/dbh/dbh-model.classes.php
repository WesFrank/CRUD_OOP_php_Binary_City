<?php

    // Database Handler Class

    // Model class connects to database and queries database

    // Viewer class extends to model class

    // Controller class extends to viewer class
    
    class DbhModel {

        // Environment File Variables/Properties
        protected $db_username;
        protected $db_password;
        protected $db_server;
        protected $db_name;

        protected function connect() {

            try {
                
                // Fetch credentials from .env file
                require_once __DIR__ . '../../../../vendor/autoload.php';
        
                $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
                $dotenv->load();
        
                $dotenv->required(['DB_HOST', 'DB_USER', 'DB_PASSWORD', 'DB_NAME', 'SECRET_KEY', 'PUBLIC_KEY']);
        
                // Set database connection variables
        
                $dbServer = $_ENV["DB_HOST"];
                $dbUser = $_ENV["DB_USER"];
                $dbPassword = $_ENV["DB_PASSWORD"];
                $dbName = $_ENV["DB_NAME"];

                // Map properties to dotenv variables
                $this->db_username = $dbUser;
                $this->db_password = (string) $dbPassword;
                $this->db_server = $dbServer;
                $this->db_name = $dbName;
                
                // Establish database connection using PDO
                $dbh = new PDO("mysql:host=$this->db_server;dbname=$this->db_name", $this->db_username, $this->db_password);
                
                $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                
                return $dbh;

            } catch (PDOException $e) {

                print "Error" . $e->getMessage() . "<br>";
                die();

            }

        }

    }
    
?>