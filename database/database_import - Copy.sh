packages:
 	yum:
 		mysql: []
	container_commands:
 		import-database:
 			command: ".ebextensions/database_import.sh"
 			leader_only: true 