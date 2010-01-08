<?php require_once './app/views/shared/_header.php' ?>
<h1><?php echo qh($this->table->getName()) ?></h1>
<p>Here are the answers for the <cite><?php echo qh($this->table->getName()) ?></cite> table.
<a href="index.php?controller=table&action=new&table=<?php echo urlencode($this->table->getName()) ?>">Ready to try it?</a></p>
<pre>
<?php echo qh($this->table->getText()) ?>
</pre>
<?php require_once './app/views/shared/_footer.php' ?>
