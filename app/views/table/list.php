<?php require_once './app/views/shared/_header.php' ?>
<h1>Welcome to Dowling’s Wheel</h1>
<p>If you are learning Latin by the <a href="http://www.wcdrutgers.net/Latin.htm">Dowling Method</a>,
you know that you need to memorize six tables in the back of <cite>Wheelock’s Latin</cite>.
This website will help you to memorize those tables (and you won’t need to buy a copy of Wheelock).
Instead of writing the tables out by hand, you can simply type them into this website and we’ll tell you
which words are correct/incorrect. <a href="index.php?controller=table&action=new&table=<?php echo urlencode(TableLoader::NOUNS) ?>&demo=1">Check out the demo.</a>
</p>
<p>Step 1: Choose a table:</p>
<ol>
    <li><a href="index.php?controller=table&action=new&table=<?php echo urlencode(TableLoader::NOUNS) ?>">Nouns</a></li>
    <li><a href="index.php?controller=table&action=new&table=<?php echo urlencode(TableLoader::ADJECTIVES) ?>">Adjectives</a></li>
    <li><a href="index.php?controller=table&action=new&table=<?php echo urlencode(TableLoader::VERBS_INDICATIVE_ACTIVE) ?>">Verbs: Indicative Active</a></li>
    <li><a href="index.php?controller=table&action=new&table=<?php echo urlencode(TableLoader::VERBS_INDICATIVE_PASSIVE) ?>">Verbs: Indicative Passive</a></li>
    <li><a href="index.php?controller=table&action=new&table=<?php echo urlencode(TableLoader::VERBS_SUBJUNCTIVE_ACTIVE) ?>">Verbs: Subjunctive Active</a></li>
    <li><a href="index.php?controller=table&action=new&table=<?php echo urlencode(TableLoader::VERBS_SUBJUNCTIVE_PASSIVE) ?>">Verbs: Subjunctive Passive</a></li>
</ol>
<?php require_once './app/views/shared/_footer.php' ?>
