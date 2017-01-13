<?php

require_once 'Parser.class.php';

$text = "ATHENS: At least 44 people, including 17 children, drowned on Friday in the Aegean Sea as two smuggling boats sunk off different Greek islands. A search-and-rescue operation was underway for others feared trapped in the wreckage.

Greek rescuers pulled 74 people to safety after two boats ran into trouble off the Aegean islands of Farmakonisi and Kalolimnos in the early hours. But the toll could rise as rescuers were still scouring the waters for people missing from the boat that capsized off Kalolimnos.

Of the survivors, “most are in a state of shock. There were families on board and in some cases only the father survived,” UNCHR official Marco Procaccini told AFP.

Charity Doctors without Borders, which is providing psychological care to survivors of the Kalolimnos shipwreck, described the horror on its Twitter account, saying “one man lost his pregnant wife and two kids, a 17-year-old lost his brother, an entire family was swallowed by the sea”.

Separately, the Turkish coastguard found the bodies of three children on Friday after a third boat sank near the seaside resort of Didim, the Dogan news agency reported.

Despite wintry conditions, thousands of people fleeing war and misery are still embarking on the dangerous journey across the Mediterranean to seek a better life in Europe.

Europe has been battling to resolve its biggest migration crisis since World War II, but member states are split on what action needs to be taken even as the number of people killed trying to get to the continent rises.

Latest confirmed figures from the International Organisation for Migration put the death toll for January at 113, a figure that includes only15 of the latest 44 fatalities.

“These deaths highlight both the heartlessness and the futility of the growing chorus demanding greater restrictions on refugee access to Europe,” said John Dalhuisen, Amnesty International’s Europe and Central Asia Programme Director.

The European Union is deeply divided on addressing the influx, with several countries blocking or restricting migrant from entering and resisting plans to share the burden of refugees. In the meantime, Germany - where most immigrants are heading - has welcomed those it considers refugees.

EU foreign policy chief Federica Mogherini said the 28-nation bloc faces big economic risks if its member countries start putting up walls between each other, due to the refugee crisis, that restrict borderless travel.

“We are doing studies of that and it is impressive,” she said, speaking at the World Economic Forum in Davos, Switzerland.

But Hungary’s prime minister, who last year built fences on his nation’s borders with Serbia and Croatia to stop migrants from coming in, praised Austria for setting a cap this week on the numbers of refugees it will take.

“Common sense has prevailed,” Viktor Orban said on Friday on state radio, calling the Austrian decision “the most important news of the past months.”

“Europe can’t take in huge masses of foreign people in an unlimited, uncontrolled manner,” he said, adding that, for Hungary, “the best migrant is the migrant who does not come.”

David Miliband, head of the International Rescue Committee charity, said it’s important that migrants who don’t qualify for refugee status are returned home - a policy often hard to implement as emigrant-producing countries such as Pakistan resist repatriations.

In Berlin, Europe’s migrant crisis was the main issue at a meeting on Friday of top officials from Germany and Turkey, with Turkey’s prime minister pressing for more support from the European Union. Germany saw an unprecedented 1.1 million asylum-seekers arrive last year, many of them fleeing conflicts in Syria, Iraq and Afghanistan, and most have come through Turkey.

Kate O’Sullivan, a member of the Save the Children charity team on the island of Lesbos, expressed horror at Friday’s drownings and urged the EU to secure safe, legal passage for refugees.

“Instead of focusing on building fences and tightening border controls, we are calling on European leaders to take action to ensure no more children lose their lives senselessly,” she said.";


echo '<p>'.$text.'</p>';

$parser = new Parser($text, 4);
$unwantedChars = [',', '!', "'s", '?', '.', ':', ';', '(', ')', "' ", '\n', '-', '_', '”', '“' ]; // create array with unwanted chars

$parser->setUnwanted($unwantedChars);
$stop_words = array(
    'a',
    'about',
    'above',
    'after',
    'again',
    'against',
    'all',
    'am',
    'an',
    'and',
    'any',
    'are',
    "aren't",
    'as',
    'at',
    'be',
    'because',
    'been',
    'before',
    'being',
    'below',
    'between',
    'both',
    'but',
    'by',
    "can't",
    'cannot',
    'could',
    "couldn't",
    'did',
    "didn't",
    'do',
    'does',
    "doesn't",
    'doing',
    "don't",
    'down',
    'during',
    'each',
    'few',
    'for',
    'from',
    'further',
    'had',
    "hadn't",
    'has',
    "hasn't",
    'have',
    "haven't",
    'having',
    'he',
    "he'd",
    "he'll",
    "he's",
    'her',
    'here',
    "here's",
    'hers',
    'herself',
    'him',
    'himself',
    'his',
    'how',
    "how's",
    'i',
    "i'd",
    "i'll",
    "i'm",
    "i've",
    'if',
    'in',
    'into',
    'is',
    "isn't",
    'it',
    "it's",
    'its',
    'itself',
    "let's",
    'me',
    'more',
    'most',
    "mustn't",
    'my',
    'myself',
    'no',
    'nor',
    'not',
    'of',
    'off',
    'on',
    'once',
    'only',
    'or',
    'other',
    'ought',
    'our',
    'ours',
    'ourselves',
    'out',
    'over',
    'own',
    'same',
    "shan't",
    'she',
    "she'd",
    "she'll",
    "she's",
    'should',
    "shouldn't",
    'so',
    'some',
    'such',
    'than',
    'that',
    "that's",
    'the',
    'their',
    'theirs',
    'them',
    'themselves',
    'then',
    'there',
    "there's",
    'these',
    'they',
    "they'd",
    "they'll",
    "they're",
    "they've",
    'this',
    'those',
    'through',
    'to',
    'too',
    'under',
    'until',
    'up',
    'very',
    'was',
    "wasn't",
    'we',
    "we'd",
    "we'll",
    "we're",
    "we've",
    'were',
    "weren't",
    'what',
    "what's",
    'when',
    "when's",
    'where',
    "where's",
    'which',
    'while',
    'who',
    'whose',
    "who's",
    'whom',
    'why',
    "why's",
    'with',
    "won't",
    'would',
    "wouldn't",
    'you',
    "you'd",
    "you'll",
    "you're",
    "you've",
    'your',
    'yours',
    'yourself',
    'yourselves',
    'zero',
    '',
    'said',
    'sunday',
    'monday',
    'tuesday',
    'wednesday',
    'thursday',
    'friday',
    'saturday',
    'sunday'
);
$parser->setStopWords($stop_words);
$tags = $parser->process();
echo '<pre>';
	 print_r($tags);
echo '</pre>';
?>