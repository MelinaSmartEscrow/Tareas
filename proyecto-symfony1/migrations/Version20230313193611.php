<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230313193611 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tarea DROP FOREIGN KEY FK_3CA05366DB38439E');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE usuario');
        $this->addSql('DROP INDEX IDX_3CA05366DB38439E ON tarea');
        $this->addSql('ALTER TABLE tarea ADD user_id INT DEFAULT NULL, DROP usuario_id');
        $this->addSql('ALTER TABLE tarea ADD CONSTRAINT FK_3CA05366A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_3CA05366A76ED395 ON tarea (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tarea DROP FOREIGN KEY FK_3CA05366A76ED395');
        $this->addSql('CREATE TABLE usuario (id VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, nombre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, apellido VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, rol VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP INDEX IDX_3CA05366A76ED395 ON tarea');
        $this->addSql('ALTER TABLE tarea ADD usuario_id VARCHAR(255) NOT NULL, DROP user_id');
        $this->addSql('ALTER TABLE tarea ADD CONSTRAINT FK_3CA05366DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('CREATE INDEX IDX_3CA05366DB38439E ON tarea (usuario_id)');
    }
}
