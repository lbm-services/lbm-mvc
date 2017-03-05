<?php include_once('Header.php'); ?>

<div class="container">
    <h2>CMS (Page Management) </h2>
    <p><?php echo __FILE__; ?></p>

    <!-- main content output -->    

    <div class="box">
        <h3>Pages</h3>
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
                <tr>
                    <td>ID</td>
                    <td>slug</td>
                    <td>Header</td>
                    <td>Description</td>
                    <td>Body</td>
                    <td>MetaDescription</td>
                    <td>MetaKeywords</td>
                    <td>Author</td>
                    <td>Created</td>
                    <td>DELETE</td>
                    <td>EDIT</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->pages as $page) { ?>
                    <tr>
                        <td><?php if (isset($page->id)) echo htmlspecialchars($page->id, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php if (isset($page->slug)) echo htmlspecialchars($page->slug, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php if (isset($page->header)) echo htmlspecialchars($page->header, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php if (isset($page->description)) echo htmlspecialchars($page->description, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php if (isset($page->body)) echo htmlspecialchars($page->body, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php if (isset($page->meta_description)) echo htmlspecialchars($page->meta_description, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php if (isset($page->meta_keywords)) echo htmlspecialchars($page->meta_keywords, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php if (isset($page->firstname)) echo htmlspecialchars($page->firstname, ENT_QUOTES, 'UTF-8'); ?>&nbsp;
                            <?php if (isset($page->lastname)) echo htmlspecialchars($page->lastname, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php if (isset($page->created)) echo htmlspecialchars($page->created, ENT_QUOTES, 'UTF-8'); ?></td>                    
                        <?php if (isset($page->link)) { ?>
                            <td><a href="<?php echo htmlspecialchars($page->link, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($page->link, ENT_QUOTES, 'UTF-8'); ?></a></td>
                        <?php } ?>

                        <td><a class="deleteLink" href="<?php echo URL . '/' . 'page/deletepage/' . htmlspecialchars($page->id, ENT_QUOTES, 'UTF-8'); ?>">delete</a></td>
                        <td><a href="<?php echo URL . '/' . 'page/editpage/' . htmlspecialchars($page->id, ENT_QUOTES, 'UTF-8'); ?>">edit</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- add page form -->
    <div class="box">
        <h3>Add Page</h3>
        <?php include_once('Page_Form.php'); ?>
    </div>

</div>
<?php include_once('Footer.php'); ?>