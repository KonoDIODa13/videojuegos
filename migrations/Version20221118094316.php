<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221118094316 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lista_juegos (id INT AUTO_INCREMENT NOT NULL, id_usuario_id INT NOT NULL, INDEX IDX_F6AD149B7EB2C349 (id_usuario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lista_juegos ADD CONSTRAINT FK_F6AD149B7EB2C349 FOREIGN KEY (id_usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE videojuego DROP usuario_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lista_juegos DROP FOREIGN KEY FK_F6AD149B7EB2C349');
        $this->addSql('DROP TABLE lista_juegos');
        $this->addSql('ALTER TABLE videojuego ADD usuario_id INT NOT NULL');
    }
}
