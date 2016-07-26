<?php include_once('Header.php'); ?>
<div class="container">
    <!-- add instrument form -->
    <div>
        <h3>Add/Edit Instrument</h3>
        <form action="<?php echo URL . (isset($this->instrument->fk_Instrument_id) ? 'user/updateInstrument' : 'user/addInstrument') ?>" method="POST">
            <label>Amount</label>
            <input autofocus type="text" name="amount" value="<?php isset($this->instrument->anzahl) ? 
                        print(htmlspecialchars($this->instrument->anzahl, ENT_QUOTES, 'UTF-8'))
                        : ''; 
            ?>" required />
            <label>Name</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($this->instrument->name, ENT_QUOTES, 'UTF-8'); ?>" disabled="disabled" />
            <label>ISIN</label>
            <input type="text" name="isin" value="<?php echo htmlspecialchars($this->instrument->isin, ENT_QUOTES, 'UTF-8'); ?>" disabled="disabled"/>
            <label>Type</label>
            <input type="text" name="type" value="<?php echo htmlspecialchars($this->instrument->type, ENT_QUOTES, 'UTF-8'); ?>" disabled="disabled"/>
            <label>Value</label>
            <input type="text" name="type" value="<?php echo htmlspecialchars($this->instrument->value, ENT_QUOTES, 'UTF-8'); ?>" disabled="disabled"/>


            <input type="hidden" name="instrument_id" value="<?php 
                        isset($this->instrument->fk_Instrument_id) ? 
                                print(htmlspecialchars($this->instrument->fk_Instrument_id, ENT_QUOTES, 'UTF-8')) :
                                print(htmlspecialchars($this->instrument->id, ENT_QUOTES, 'UTF-8')) 
                                
                                ; ?>" />
            <input type="submit" name="submit_update_instrument" value="<?php echo (isset($this->instrument->fk_Instrument_id) ? 'update' : 'add') ?>" />
            <input type="button" name="cancel" value="Cancel" onclick="history.back();" />
        </form>
    </div>
</div>


<?php include_once('Footer.php'); ?>