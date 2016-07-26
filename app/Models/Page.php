<?php

namespace Lbm\Mvc\Models;

class Page
{

    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /**
     * 
     * @return ResultObject
     */
    public function getAllPage()
    {

        $sql = "SELECT page.id, page.slug, page.header, page.description, page.body, page.meta_description, page.meta_keywords, page.created, page.fk_user_id, user.firstname, user.lastname FROM page "
                . " LEFT JOIN user ON user.id = page.fk_user_id";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    /**
     * 
     * @param type $data
     */
    public function addPage($data)
    {
        $sql = "INSERT INTO page ( slug,
                                    header,
                                    description,
                                    body,
                                    meta_description,
                                    meta_keywords,
                                    fk_user_id)
                VALUES
                ( 
                    :slug,
                    :header,
                    :description,
                    :body,
                    :meta_description,
                    :meta_keywords,
                    :fk_user_id
                )";
        $query = $this->db->prepare($sql);
        $parameters = [
            ':slug' => $data['slug'],
            ':header' => $data['header'],
            ':description' => $data['description'],
            ':body' => $data['body'],
            ':meta_description' => $data['meta_description'],
            ':meta_keywords' => $data['meta_keywords'],
            ':fk_user_id' => $data['fk_user_id']
        ];

        $query->execute($parameters);
    }

    /**
     * 
     * @param type $login
     * @return type
     */
    public function getPagebySlug($slug)
    {
        $sql = "SELECT page.id, page.slug, page.header, page.description, page.body, page.meta_description, page.meta_keywords, page.created, page.fk_user_id, user.firstname, user.lastname FROM page "
                . " LEFT JOIN user ON user.id = page.fk_user_id "
                . " WHERE page.slug = :slug";

        $query = $this->db->prepare($sql);

        $parameters = [
            ':slug' => $slug
        ];

        $query->execute($parameters);

        return $query->fetch();
    }

    /**
     * Delete a page from the database
     * @param int $user_id Id of user
     */
    public function deletePage($pageId)
    {
        $sql = "DELETE FROM page WHERE id = :pageId";
        $query = $this->db->prepare($sql);
        $parameters = array(':pageId' => $pageId);

        $query->execute($parameters);
    }

    /**
     * Get a user from database
     */
    public function getPage($id)
    {
        $sql = "SELECT page.id, page.slug, page.header, page.description, page.body, page.meta_description, page.meta_keywords, page.created, page.fk_user_id, user.firstname, user.lastname FROM page "
                . " LEFT JOIN user ON user.id = page.fk_user_id "
                . " WHERE page.id = :pageId";

        $query = $this->db->prepare($sql);
        $parameters = array(':pageId' => $id);

        $query->execute($parameters);

        return $query->fetch();
    }

    /**
     * Action updatePage
     * @param type $data
     */
    public function updatePage($data)
    {
        $sql = "UPDATE page
                SET
                header = :header,
                description = :description,
                body = :body,
                meta_description = :meta_description,
                meta_keywords = :meta_keywords,
                fk_user_id = :fk_user_id,
                slug = :slug
                WHERE id = :id;
                ";
        $query = $this->db->prepare($sql);

        $parameters = [
            ':id' => $data['id'],
            ':slug' => $data['slug'],
            ':header' => $data['header'],
            ':description' => $data['description'],
            ':body' => $data['body'],
            ':meta_description' => $data['meta_description'],
            ':meta_keywords' => $data['meta_keywords'],
            ':fk_user_id' => $data['fk_user_id']
        ];

        $query->execute($parameters);
    }

    public function getPageCount()
    {
        $sql = "SELECT COUNT(id) AS page_count FROM page";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch()->page_count;
    }

}
