<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250526002215 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE product_tag (product_id INT NOT NULL, tag_id INT NOT NULL, PRIMARY KEY(product_id, tag_id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_E3A6E39C4584665A ON product_tag (product_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_E3A6E39CBAD26311 ON product_tag (tag_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE product_tag ADD CONSTRAINT FK_E3A6E39C4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE product_tag ADD CONSTRAINT FK_E3A6E39CBAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE comment ADD product_id INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE comment ADD CONSTRAINT FK_9474526C4584665A FOREIGN KEY (product_id) REFERENCES product (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_9474526C4584665A ON comment (product_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE product ADD metadata_id INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE product ADD CONSTRAINT FK_D34A04ADDC9EE959 FOREIGN KEY (metadata_id) REFERENCES metadata (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_D34A04ADDC9EE959 ON product (metadata_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE product_tag DROP CONSTRAINT FK_E3A6E39C4584665A
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE product_tag DROP CONSTRAINT FK_E3A6E39CBAD26311
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE product_tag
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE product DROP CONSTRAINT FK_D34A04ADDC9EE959
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX UNIQ_D34A04ADDC9EE959
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE product DROP metadata_id
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE comment DROP CONSTRAINT FK_9474526C4584665A
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_9474526C4584665A
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE comment DROP product_id
        SQL);
    }
}
