<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221121074117 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lista_juegos DROP FOREIGN KEY FK_F6AD149B82925A85');
        $this->addSql('DROP INDEX IDX_F6AD149B82925A85 ON lista_juegos');
        $this->addSql('ALTER TABLE lista_juegos ADD videojuego LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', DROP videojuego_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lista_juegos ADD videojuego_id INT NOT NULL, DROP videojuego');
        $this->addSql('ALTER TABLE lista_juegos ADD CONSTRAINT FK_F6AD149B82925A85 FOREIGN KEY (videojuego_id) REFERENCES videojuego (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_F6AD149B82925A85 ON lista_juegos (videojuego_id)');
    }
}
