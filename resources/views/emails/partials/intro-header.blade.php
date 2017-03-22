<tr>
  <td align="center" valign="top">
    <!-- CENTERING TABLE // -->
    <!--
      The centering table keeps the content
         tables centered in the emailBody table,
         in case its width is set to 100%.
      -->
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="color:#FFFFFF;" bgcolor="{{ $theme_bg_color }}">
      <tbody>
      <tr>
        <td align="center" valign="top">
          <!-- FLEXIBLE CONTAINER // -->
          <!--
            The flexible container has a set width
               that gets overridden by the media query.
               Most content tables within can then be
               given 100% widths.
            -->
          <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
            <tbody>
            <tr>
              <td align="center" valign="top" width="500" class="flexibleContainerCell">
                <!-- CONTENT TABLE // -->
                <!--
                  The content table is the first element
                     that's entirely separate from the structural
                     framework of the email.
                  -->
                <table border="0" cellpadding="30" cellspacing="0" width="100%">
                  <tbody>
                  <tr>
                    <td align="center" valign="top" class="textContent">
                      <h1 style="color:{{ $theme_primary_color }};line-height:100%;font-family:Helvetica,Arial,sans-serif;font-size:35px;font-weight:normal;margin-bottom:5px;text-align:center;">{{ $main_heading }}</h1>
                      @if($sub_heading)
                        <h2 style="text-align:center;font-weight:normal;font-family:Helvetica,Arial,sans-serif;font-size:23px;margin-bottom:10px;color:{{ $theme_secondary_color }};line-height:135%;">{{ $sub_heading }}</h2>
                      @endif
                      @if($header_text)
                        <div style="text-align:center;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#FFFFFF;line-height:135%;">{{ $header_text }}</div>
                      @endif
                    </td>
                  </tr>
                  </tbody>
                </table>
                <!-- // CONTENT TABLE -->
              </td>
            </tr>
            </tbody>
          </table>
          <!-- // FLEXIBLE CONTAINER -->
        </td>
      </tr>
      </tbody>
    </table>
    <!-- // CENTERING TABLE -->
  </td>
</tr>