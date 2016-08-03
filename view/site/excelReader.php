<?php


  $data = array();

  function add_person( $date, $inTime, $outTime, $WorkTime,$OverTime )
  {
      global $data;

      $data []= array(
          'Date' => $date,
          'In Time' => $inTime,
          'Out Time' => $outTime,
          'Work Time' => $WorkTime,
          'Over Time' => $OverTime
      );
  }


      $dom = new DOMDocument;
      $dom ->load('test.xml');
      $rows = $dom->getElementsByTagName( 'Row' );
      $first_row = true;
      foreach ($rows as $row)
      {
          if ( !$first_row )
          {
              $date = "";
              $inTime = "";
              $outTime = "";
              $workTime = "";
              $overTme ="";

              $index = 1;
              $cells = $row->getElementsByTagName( 'Cell' );
              foreach( $cells as $cell )
              {
                  $ind = $cell->getAttribute( 'Index' );
                  if ( $ind != null ) $index = $ind;

                  if ( $index == 1 ) $date = $cell->nodeValue;
                  if ( $index == 2 ) $inTime = $cell->nodeValue;
                  if ( $index == 3 ) $outTime = $cell->nodeValue;
                  if ( $index == 4 ) $workTime = $cell->nodeValue;
                  if ($index == 5  ) $overTme  = $cell->nodeValue;

                  $index += 1;
              }
              add_person( $date, $inTime, $outTime, $workTime,$overTme );
          }
          $first_row = false;

  }
  ?>


