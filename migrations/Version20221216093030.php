<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221216093030 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE videojuego_genero (videojuego_id INT NOT NULL, genero_id INT NOT NULL, INDEX IDX_88A29E6182925A85 (videojuego_id), INDEX IDX_88A29E61BCE7B795 (genero_id), PRIMARY KEY(videojuego_id, genero_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE videojuego_empresa_desarrolladora (videojuego_id INT NOT NULL, empresa_desarrolladora_id INT NOT NULL, INDEX IDX_4408E7EF82925A85 (videojuego_id), INDEX IDX_4408E7EF2B469E84 (empresa_desarrolladora_id), PRIMARY KEY(videojuego_id, empresa_desarrolladora_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE videojuego_genero ADD CONSTRAINT FK_88A29E6182925A85 FOREIGN KEY (videojuego_id) REFERENCES videojuego (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE videojuego_genero ADD CONSTRAINT FK_88A29E61BCE7B795 FOREIGN KEY (genero_id) REFERENCES genero (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE videojuego_empresa_desarrolladora ADD CONSTRAINT FK_4408E7EF82925A85 FOREIGN KEY (videojuego_id) REFERENCES videojuego (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE videojuego_empresa_desarrolladora ADD CONSTRAINT FK_4408E7EF2B469E84 FOREIGN KEY (empresa_desarrolladora_id) REFERENCES empresa_desarrolladora (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE videojuego_genero DROP FOREIGN KEY FK_88A29E6182925A85');
        $this->addSql('ALTER TABLE videojuego_genero DROP FOREIGN KEY FK_88A29E61BCE7B795');
        $this->addSql('ALTER TABLE videojuego_empresa_desarrolladora DROP FOREIGN KEY FK_4408E7EF82925A85');
        $this->addSql('ALTER TABLE videojuego_empresa_desarrolladora DROP FOREIGN KEY FK_4408E7EF2B469E84');
        $this->addSql('DROP TABLE videojuego_genero');
        $this->addSql('DROP TABLE videojuego_empresa_desarrolladora');
    }
}
