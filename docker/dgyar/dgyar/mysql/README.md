# DB Versioning

Versioning used in this system is based on FlywayDB versioning. First three number in the version is matched to version of Pluf. Fourth number in the version is for small changes in the SQL of database wich is not affected by Pluf. For example if we add an index on a field which is not affected by php codes in the Pluf we will increase fourth number in the version of SQL.
