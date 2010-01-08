<?php require_once './app/views/shared/_header.php' ?>
<?php
if ($this->demoing) { ?>
    <p class="instructions">Here we’ve filled in answers for the <cite>Nouns</cite> table (including a few mistakes).
    Press “Submit” to see how colors are used to indicate correct and incorrect answers.</p>
<?php
} ?>
<h1><?php echo qh($this->table->getName()) ?></h1>
<p>Fill in the table as best you can, then press Submit. We’ll show you which
values are right and which are wrong. If needed,
<a href="index.php?controller=table&action=show&table=<?php echo urlencode($this->table->getName()) ?>">take a peek at the answers</a>.
<?php
if (! $this->demoing) { ?>
    Or check out the <a href="index.php?controller=table&action=new&table=<?php echo urlencode(TableLoader::NOUNS) ?>&demo=1">demo</a>.
<?php
} ?>
</p>
<form action="index.php?controller=table&action=create&table=<?php echo urlencode($this->table->getName()) ?>" method="post">
<input type="submit" class="submit" value="Submit" />
<textarea id="text" name="text"><?php echo qh($this->text) ?></textarea>
<input type="submit" class="submit" value="Submit" />
</form>
<?php
if (! $this->demoing) { ?>
    <textarea id="answers" style="display:none"><?php echo qh($this->answers) ?></textarea>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script src="public/javascripts/shared/util.js"></script>
    <script src="public/javascripts/table/new.js"></script>
<?php
} ?>
<?php require_once './app/views/shared/_footer.php' ?>
