<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221118081018 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lista_videojuegos DROP FOREIGN KEY FK_9F0B3C1E7EB2C349');
        $this->addSql('ALTER TABLE lista_videojuegos DROP FOREIGN KEY FK_9F0B3C1E3CBA8BE0');
        $this->addSql('DROP TABLE lista_videojuegos');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lista_videojuegos (id INT AUTO_INCREMENT NOT NULL, id_usuario_id INT NOT NULL, id_videojuego_id INT NOT NULL, UNIQUE INDEX UNIQ_9F0B3C1E7EB2C349 (id_usuario_id), INDEX IDX_9F0B3C1E3CBA8BE0 (id_videojuego_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE lista_videojuegos ADD CONSTRAINT FK_9F0B3C1E7EB2C349 FOREIGN KEY (id_usuario_id) REFERENCES usuario (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE lista_videojuegos ADD CONSTRAINT FK_9F0B3C1E3CBA8BE0 FOREIGN KEY (id_videojuego_id) REFERENCES videojuego (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
