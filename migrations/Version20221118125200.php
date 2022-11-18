<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221118125200 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lista_juegos (id INT AUTO_INCREMENT NOT NULL, usuario_id INT NOT NULL, videojuego_id INT NOT NULL, INDEX IDX_F6AD149BDB38439E (usuario_id), INDEX IDX_F6AD149B82925A85 (videojuego_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lista_juegos ADD CONSTRAINT FK_F6AD149BDB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE lista_juegos ADD CONSTRAINT FK_F6AD149B82925A85 FOREIGN KEY (videojuego_id) REFERENCES videojuego (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lista_juegos DROP FOREIGN KEY FK_F6AD149BDB38439E');
        $this->addSql('ALTER TABLE lista_juegos DROP FOREIGN KEY FK_F6AD149B82925A85');
        $this->addSql('DROP TABLE lista_juegos');
    }
}
