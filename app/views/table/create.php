<?php require_once './app/views/shared/_header.php' ?>
<h1><?php echo qh($this->table->getName()) ?></h1>
<p>We have finished marking your submission. Words in green are correct;
words in red are incorrect (with the correct word shown in parentheses).
<a href="index.php?controller=table&action=new&table=<?php echo urlencode($this->table->getName()) ?>">Try again?</a></p>
<pre>
<?php echo $this->diff ?>
</pre>
<?php require_once './app/views/shared/_footer.php' ?>
