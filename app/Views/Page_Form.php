
        <div class="box">
            <form action="<?php echo URL . (isset($this->page->id) ? 'page/updatepage' : 'page/addpage');  ?>" method="POST">
                <label>Slug</label>
                <input type="text" name="slug" value="<?php echo (isset($this->page->slug) ? $this->escapeString($this->page->slug) : ''); ?>" required />
                <p class="error"><small><?php echo (isset($this->error["slug"]) ? $this->error["slug"] : ''); ?></small></p>
                <label>Header</label>
                <input type="text" name="header" value="<?php echo (isset($this->page->header) ? $this->escapeString($this->page->header) : ''); ?>" required />
                <p class="error"><small><?php echo (isset($this->error["header"]) ? $this->error["header"] : ''); ?></small></p>
                <label>Description</label>
                <input type="text" name="description" value="<?php echo (isset($this->page->description) ? $this->escapeString($this->page->description) : ''); ?>" />
                <p class="error"><small><?php echo (isset($this->error["description"]) ? $this->error["description"] : ''); ?></small></p>
                <label>Body</label>
                <textarea cols="55" rows="25" name="body">
                    <?php echo (isset($this->page->body) ? $this->escapeString($this->page->body) : ''); ?>
                </textarea>

                <p class="error"><small><?php echo (isset($this->error["body"]) ? $this->error["body"] : ''); ?></small></p>

                <label>Meta Description</label>
                <input type="text" name="meta_description" value="<?php echo (isset($this->page->meta_description) ? $this->escapeString($this->page->meta_description) : ''); ?>" />
                <p class="error"><small><?php echo (isset($this->error["meta_description"]) ? $this->error["meta_description"] : ''); ?></small></p>

                <label>Meta Keywords</label>
                <input type="text" name="meta_keywords" value="<?php echo (isset($this->page->meta_keywords) ? $this->escapeString($this->page->meta_keywords) : ''); ?>" />
                <p class="error"><small><?php echo (isset($this->error["meta_keywords"]) ? $this->error["meta_keywords"] : ''); ?></small></p>
                <?php if (isset($this->page->id)) : ?> <input type="hidden" name="id" value="<?php echo $this->page->id ?>"/><?php endif; ?>
                <input type="submit" name="<?php echo (isset($this->page->id) ? 'submit_update_page' : 'submit_add_page');?>" value="Submit" />
            </form>
        </div>
