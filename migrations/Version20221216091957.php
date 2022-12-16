<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221216091957 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE videojuego_director (videojuego_id INT NOT NULL, director_id INT NOT NULL, INDEX IDX_B30BCA9C82925A85 (videojuego_id), INDEX IDX_B30BCA9C899FB366 (director_id), PRIMARY KEY(videojuego_id, director_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE videojuego_director ADD CONSTRAINT FK_B30BCA9C82925A85 FOREIGN KEY (videojuego_id) REFERENCES videojuego (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE videojuego_director ADD CONSTRAINT FK_B30BCA9C899FB366 FOREIGN KEY (director_id) REFERENCES director (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE videojuego_director DROP FOREIGN KEY FK_B30BCA9C82925A85');
        $this->addSql('ALTER TABLE videojuego_director DROP FOREIGN KEY FK_B30BCA9C899FB366');
        $this->addSql('DROP TABLE videojuego_director');
    }
}
