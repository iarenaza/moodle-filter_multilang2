
# To Install it manually #

- Unzip the plugin in the moodle .../filter/ directory.
- Enable it from "Site Administration >> Plugins >> Filters >> Manage filters".

# To Use it #
- Create your contents in multiple languages.
- Enclose every language content between {mlang NN} and {mlang} tags:
  <pre>
    {mlang XX}content in language XX{mlang}
    {mlang YY}content in language YY{mlang}
    {mlang other}content for other languages{mlang}
  </pre>
  where **XX** and **YY** are the Moodle short names for the language packs
  (i.e., en, fr, de, etc.) or the special language name 'other'.
- 2019.11.19 A new enhanced syntax to be able to specify multiple
  languages for a single tag is now available. Just specify the list
  of the languages separated by commas:
  <pre>
  {mlang XX,YY,ZZ}Text displayed if current lang is XX, YY or ZZ, or one of their parent laguages.{mlang}
  </pre>
- Test it (by changing your browsing language in Moodle).

# How it works #
- Look for "lang blocks" in the text to be filtered.
- For each "lang block":
  - If there are texts in the currently active language, print them.
  - Else, if there exist texts in the current parent language, print them.
  - Else, as fallback, print the text with language 'other' if such
   one is set.
- Text outside of "lang blocks" will always be shown.

## Definition of "lang block" ##
Is any text (including spaces, tabs, linefeeds or return characters)
placed between '{mlang XX}' and '{mlang}' markers. You can not only
put text inside "lang block", but also images, videos or external
embedded content. For example, this is a valid "lang block":

<pre>
{mlang es,es_mx,es_co}
First paragraph of text. First paragraph of text. First paragraph of text.

Second paragraph of text. Second paragraph of text. Second paragraph of text.

((-- An image goes here --))

Third paragraph of text. Third paragraph of text. Third paragraph of text.

((-- A Youtube video goes here --))

Fourth paragraph of text. Fourth paragraph of text. Fourth paragraph of text.
{mlang}
</pre>

## One example in action ##

- This text:
  <pre>
  {mlang other}Hello!{mlang}{mlang es,es_mx}¡Hola!{mlang}
  This text is common for all languages because it's outside of all lang blocks.
  {mlang other}Bye!{mlang}{mlang it}Ciao!{mlang}
  </pre>
- If the current language is any language except "Spanish International", "Spanish - Mexico" or Italian, it will print:
  <pre>
  Hello!
  This text is common for all languages because it's outside of all lang blocks.
  Bye!
  </pre>
- If the current language is "Spanish International" or "Spanish - Mexico", it will print:
  <pre>
  ¡Hola!
  This text is common for all languages because it's outside of all lang blocks.
  </pre>
  Notice the final 'Bye!' / 'Ciao!' is not printed.
- If the current language is Italian, it will print:
  <pre>
  This text is common for all languages because it's outside of all lang blocks.
  Ciao!
  </pre>
  Notice the leading 'Hello!' / '¡Hola!' is not printed.
