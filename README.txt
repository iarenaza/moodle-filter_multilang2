To Install it manually:

    - Unzip the plugin in the moodle .../filter/ directory.
    - Enable if from "Administration/Filters".

To Use it:

    - Create your contents in multiple languages.
    - Enclose every language content between:

        {mlang XX}your_content_here{mlang}{mlang YY}your_content_other_lang{mlang}

      where XX and YY are the ISO6391 two letter code for the language
      (i.e., 'en', 'fr', 'de', etc.)
    - Test it (by changing your language).

How it works:

    - look for "lang blocks" in the code.
    - for each "lang block":
        - if there are texts in the currently active language, print
          them.
        - else, if there exists texts in the current parent language,
          print them.
        - else, don't print any text inside the lang block (this is a
          change from previous filter versions behaviour!!!!)
    - text out of "lang blocks" will be showed always.

Definition of "lang block":

    Is any text (including spaces, tabs, linefeeds or return
    characters) placed between '{mlang XX}' and '{mlang}' markers.


One example in action:

    - This text:

        {mlang en}Hello!{mlang}{mlang es}¡Hola!{mlang}
        This text is common for every language because it's out from
        any lang block.
        {mlang en}Bye!{mlang}{mlang it}Ciao!{mlang}

    - Will print, if current language is English:

        Hello!
        This text is common for every language because it's out from
        any lang block.
        Bye!

    - In Spanish, it will print:

        ¡Hola!
        This text is common for every language because it's out from
        any lang block.

      Notice the final 'Bye!' / 'Ciao!' is not printed!

    - In Italian, it will print:

        This text is common for every language because it's out from
        any lang block.  Ciao!

      Notice the leading 'Hello!' / '¡Hola!' is not printed!

Saludos.
Iñaki.
2016.01.16
