<?php
  function Get_Cookie_Compliance_Head()
  {
    global                   $page;
    global                   $addonPathData;

    if( $page->requested != 'Admin_CookieCompliance' && ! $page->title )
    { 
      // don't show on other admin pages ( ! $page->title ==> admin page )
      return;
    }

    $configFile              = $addonPathData.'/config.php';
    if( ! file_exists( $configFile ) )
    {
      return;
    }

    include $configFile;

    if( ! isset( $config ) )
    {
      return;
    }

    $button_color         = $config['button_color'];
    $button_text_color    = $config['button_text_color'];
    $background_color     = $config['background_color'];
    $text_color           = $config['text_color'];
    $header_text          = $config['header_text'];
    $text                 = $config['text'];
    $agree_button_text    = $config['agree_button_text'];
    $policy_button_text   = $config['policy_button_text'];
    $policy_url           = $config['policy_url'];

    $page->head           .= "\n";
    $page->head           .= "\n<link rel='stylesheet' type='text/css' href='//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css' />";
    $page->head           .= "\n<script src='//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js'></script>";
    $page->head           .= "\n<script>";
    $page->head           .= "\nwindow.addEventListener('load', function(){";
    $page->head           .= "\nwindow.cookieconsent.initialise({";
    $page->head           .= "\n  'layout': 'custom-layout',";
    $page->head           .= "\n  'layouts': {";
    $page->head           .= "\n    'custom-layout': '<div class=\"cc-custom-layout\">\\";
    $page->head           .= "\n      {{header}}{{messagelink}}</div>{{compliance}}',";
    $page->head           .= "\n  },";
    $page->head           .= "\n  'palette': {";
    $page->head           .= "\n    'popup': {";
    $page->head           .= "\n      'background': '#".$background_color."',";
    $page->head           .= "\n      'text': '#".$text_color."'";
    $page->head           .= "\n    },";
    $page->head           .= "\n    'button': {";
    $page->head           .= "\n      'background': '#".$button_color."',";
    $page->head           .= "\n      'text': '#".$button_text_color."'";
    $page->head           .= "\n    }";
    $page->head           .= "\n  },";
    $page->head           .= "\n  'content': {";
    $page->head           .= "\n    'header': '".$header_text."',";
    $page->head           .= "\n    'message': '".$text."',";
    $page->head           .= "\n    'dismiss': '".$agree_button_text."',";
    $page->head           .= "\n    'link': '".$policy_button_text."',";
    $page->head           .= "\n    'href': '".$policy_url."'";
    $page->head           .= "\n  },";
    $page->head           .= "\n  'elements': {";
    $page->head           .= "\n    'header': '<small class=\"cc-custom-header\"><strong>{{header}} -</strong></small>&nbsp;',";
    $page->head           .= "\n    'message': '<small id=\"cookieconsent:desc\" class=\"cc-message\">{{message}}</small>',";
    $page->head           .= "\n    'messagelink': '<small id=\"cookieconsent:desc\" class=\"cc-message\">{{message}} <a aria-label=\"learn more about cookies\" tabindex=\"0\" class=\"cc-link\" href=\"{{href}}\" target=\"_blank\">{{link}}</a></small>',";
    $page->head           .= "\n    'link': '<a aria-label=\"learn more about cookies\" tabindex=\"0\" class=\"cc-link\" href=\"{{href}}\" target=\"_blank\"><small>{{link}}</small></a>',";
    $page->head           .= "\n  }";
    $page->head           .= "\n})});";
    $page->head           .= "\n</script>";
    $page->head           .= "\n";
  }
