<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221219071651 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE plataforma (id INT AUTO_INCREMENT NOT NULL, plataforma VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE videojuego_plataforma (videojuego_id INT NOT NULL, plataforma_id INT NOT NULL, INDEX IDX_DDDABEE82925A85 (videojuego_id), INDEX IDX_DDDABEEEB90E430 (plataforma_id), PRIMARY KEY(videojuego_id, plataforma_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE videojuego_plataforma ADD CONSTRAINT FK_DDDABEE82925A85 FOREIGN KEY (videojuego_id) REFERENCES videojuego (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE videojuego_plataforma ADD CONSTRAINT FK_DDDABEEEB90E430 FOREIGN KEY (plataforma_id) REFERENCES plataforma (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE videojuego_plataforma DROP FOREIGN KEY FK_DDDABEE82925A85');
        $this->addSql('ALTER TABLE videojuego_plataforma DROP FOREIGN KEY FK_DDDABEEEB90E430');
        $this->addSql('DROP TABLE plataforma');
        $this->addSql('DROP TABLE videojuego_plataforma');
    }
}
