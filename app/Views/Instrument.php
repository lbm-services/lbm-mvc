<?php include_once('Header.php'); ?>
<div class="container">
    <h2></h2>
    <p><?php echo __FILE__;?></p>
    <!-- add instrument form -->
   
    <!-- main content output -->
    <div class="box">
        <h3>instruments available <?php echo $this->amount_of_instruments; ?></h3>
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>Id</td>
                <td>ISIN</td>
                <td>Name</td>
                <td>Type</td>
                <td>Value</td>
                <td>DELETE</td>
                <td>EDIT</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($this->instruments as $instrument) { ?>
                <tr>
                    <td><?php if (isset($instrument->id)) echo htmlspecialchars($instrument->id, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($instrument->isin)) echo htmlspecialchars($instrument->isin, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($instrument->name)) echo htmlspecialchars($instrument->name, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($instrument->type)) echo htmlspecialchars($instrument->type, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($instrument->value)) echo htmlspecialchars($instrument->value, ENT_QUOTES, 'UTF-8'); ?></td>
                    
                        <?php if (isset($instrument->link)) { ?>
                            <td><a href="<?php echo htmlspecialchars($instrument->link, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($instrument->link, ENT_QUOTES, 'UTF-8'); ?></a></td>
                        <?php } ?>
                    
                    <td><a class="deleteLink" href="<?php echo URL . '/' . 'instrument/deleteinstrument/' . htmlspecialchars($instrument->id, ENT_QUOTES, 'UTF-8'); ?>">delete</a></td>
                    <td><a href="<?php echo URL . '/' . 'instrument/editinstrument/' . htmlspecialchars($instrument->id, ENT_QUOTES, 'UTF-8'); ?>">edit</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>



<?php include_once('Footer.php'); ?>