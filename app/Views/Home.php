<?php include_once('Header.php'); ?>

<?php if (isset($this->pagecontent->header)): ?>
<div class="container">
    <h1><?php echo $this->escapeString($this->pagecontent->header); ?></h1>
    <?php echo __FILE__.'<br/>';?>
    <p><i>Author: <?php echo (isset($this->pagecontent->firstname) ? $this->escapeString($this->pagecontent->firstname) .' ' : ''); ?>
    <?php echo (isset($this->pagecontent->lastname) ? $this->escapeString($this->pagecontent->lastname)  : ''); ?>
        </i></p>
<?php endif; ?>    
    
    <p>
        <?php echo nl2br($this->escapeString($this->pagecontent->body)); ?>        
    </p>
</div>

<?php include_once('Footer.php'); ?>