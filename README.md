Tabla Users:
```
 CREATE TABLE `admin_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
);
```

Crear nuevo usuario:

```
CREATE TABLE `NuevoUsuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
);
```

Insertar un usuario (usuario@usuario.com y password "12345678"): 

```
INSERT INTO `users` VALUES (1,'usuario','usuario@usuario.com',NULL,'$2y$10$om5sEc.3.Gi9Uf6S9NU0DeY7u6rJO9YQDud3L9rC46TtD/ON35/6G',NULL,'2024-08-13 02:25:25','2024-08-13 02:25:25');
```