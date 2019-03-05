## Seeme's Blog

-- Call Stored Procedure
-- MySQL uses CALL , Not EXEC to run procedures
DB::select('CALL my_stored_procedure("param1","Param2")');
DB::select('CALL my_stored_procedure(?,?,?)',array($param1,$param2,$param3));
DB::select('CALL my_stored_procedure');

-- Force Https --
Add env variable 
Use AppServiceProvider 
Or Set https on config.app


-----CREATE .htaccess in root and add this commands
<IfModule mod_rewrite.c>
  RewriteEngine On
  RewriteCond %{HTTPS} !=on
  RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301] 
  RewriteRule ^(.*)$ public/$1 [L]
</IfModule>

