<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221129084936 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE videojuego DROP director, DROP genero, DROP desarrollador');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE videojuego ADD director LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', ADD genero LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', ADD desarrollador LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\'');
    }
}
