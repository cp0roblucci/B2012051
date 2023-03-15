<?php
    $username = "root";
    $password = "";

    // Oracle
    $ODBCConnection = odbc_connect("Driver={Devart ODBC driver for Oracle};
                                            Direct=true;Host=myhost;Port=myport;
                                            Service Name=myservicename;
                                            User ID=myuserid;password=mypassword", $username, $password);


    // SQL Server
    $ODBCConnection = odbc_connect("DRIVER={Devart ODBC Driver for SQL Server};
                                            Server=myserver;
                                            Database=mydatabase;
                                            Port=myport;
                                            String Types=Unicode", $username, $password);

    // SQLite
    $ODBCConnection = odbc_connect("DRIVER={Devart ODBC Driver for SQLite};
                                            Direct=True;
                                            Database=mydatabase;
                                            String Types= Unicode", $username, $password);
?>