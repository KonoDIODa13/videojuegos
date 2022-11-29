<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221129121216 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lista_juegos ADD usuario_id INT DEFAULT NULL, ADD videojuego_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lista_juegos ADD CONSTRAINT FK_F6AD149BDB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE lista_juegos ADD CONSTRAINT FK_F6AD149B82925A85 FOREIGN KEY (videojuego_id) REFERENCES videojuego (id)');
        $this->addSql('CREATE INDEX IDX_F6AD149BDB38439E ON lista_juegos (usuario_id)');
        $this->addSql('CREATE INDEX IDX_F6AD149B82925A85 ON lista_juegos (videojuego_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lista_juegos DROP FOREIGN KEY FK_F6AD149BDB38439E');
        $this->addSql('ALTER TABLE lista_juegos DROP FOREIGN KEY FK_F6AD149B82925A85');
        $this->addSql('DROP INDEX IDX_F6AD149BDB38439E ON lista_juegos');
        $this->addSql('DROP INDEX IDX_F6AD149B82925A85 ON lista_juegos');
        $this->addSql('ALTER TABLE lista_juegos DROP usuario_id, DROP videojuego_id');
    }
}
