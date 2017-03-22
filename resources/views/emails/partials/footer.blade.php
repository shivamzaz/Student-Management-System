<!-- MODULE ROW // -->
<tr>
  <td align="center" valign="top">
    <!-- CENTERING TABLE // -->
    <table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="{{ $footer_bg_color }}">
      <tbody>
      <tr style="padding-top:0;">
        <td align="center" valign="top">
          <!-- FLEXIBLE CONTAINER // -->
          <table border="0" cellpadding="30" cellspacing="0" width="500" class="flexibleContainer">
            <tbody>
            <tr>
              <td align="center" valign="top" width="500" class="flexibleContainerCell">
                <!-- CONTENT TABLE // -->
                <table border="0" cellpadding="0" cellspacing="0" width="50%" class="emailButton" style="background-color: {{ $theme_bg_color }}">

                  @if($click_to_action == true)

                    @include('emails.partials.click-to-action', [
                      'click_to_action' =>  $click_to_action,
                      'button_text'     =>  $button_text,
                      'button_link'     =>  $button_link,
                    ])

                  @endif
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
<!-- // MODULE ROW -->