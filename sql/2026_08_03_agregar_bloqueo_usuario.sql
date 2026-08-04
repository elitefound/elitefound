-- Migración requerida para habilitar bloqueo y desbloqueo de usuarios.
-- No elimina ni transforma datos existentes. Las cuentas actuales quedan desbloqueadas.
ALTER TABLE `user`
    ADD COLUMN `bloqueado` TINYINT(1) NOT NULL DEFAULT 0 AFTER `confirma`;
