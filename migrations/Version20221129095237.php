<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221129095237 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE empresa_desarrolladora (id INT AUTO_INCREMENT NOT NULL, videojuego_id INT DEFAULT NULL, desarrolladora VARCHAR(255) NOT NULL, INDEX IDX_F616848482925A85 (videojuego_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genero (id INT AUTO_INCREMENT NOT NULL, videojuego_id INT DEFAULT NULL, genero VARCHAR(255) NOT NULL, INDEX IDX_A000883A82925A85 (videojuego_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE empresa_desarrolladora ADD CONSTRAINT FK_F616848482925A85 FOREIGN KEY (videojuego_id) REFERENCES videojuego (id)');
        $this->addSql('ALTER TABLE genero ADD CONSTRAINT FK_A000883A82925A85 FOREIGN KEY (videojuego_id) REFERENCES videojuego (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE empresa_desarrolladora DROP FOREIGN KEY FK_F616848482925A85');
        $this->addSql('ALTER TABLE genero DROP FOREIGN KEY FK_A000883A82925A85');
        $this->addSql('DROP TABLE empresa_desarrolladora');
        $this->addSql('DROP TABLE genero');
    }
}
