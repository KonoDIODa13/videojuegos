<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221129090739 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE director DROP FOREIGN KEY FK_1E90D3F082925A85');
        $this->addSql('DROP INDEX IDX_1E90D3F082925A85 ON director');
        $this->addSql('ALTER TABLE director DROP videojuego_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE director ADD videojuego_id INT NOT NULL');
        $this->addSql('ALTER TABLE director ADD CONSTRAINT FK_1E90D3F082925A85 FOREIGN KEY (videojuego_id) REFERENCES videojuego (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_1E90D3F082925A85 ON director (videojuego_id)');
    }
}
