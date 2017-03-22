<tr>
  <td align="center" valign="top">
    <!-- CENTERING TABLE // -->
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
      <tbody>
      <tr>
        <td align="center" valign="top">
          <!-- FLEXIBLE CONTAINER // -->
          <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
            <tbody>
            <tr>
              <td align="center" valign="top" width="500" class="flexibleContainerCell">
                <table border="0" cellpadding="30" cellspacing="0" width="100%">
                  <tbody>
                  <tr>
                    <td align="center" valign="top">
                      <!-- CONTENT TABLE // -->
                      <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                        <tr>
                          <td valign="top" class="textContent">
                            <div style="text-align:center;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;margin-top:3px;color:#5F5F5F;line-height:135%;">{{ $message }}</div>
                          </td>
                        </tr>

                        @if(isset($sub_message) || isset($sub_message_heading))
                          <br>
                          <tr>
                            <td valign="top" class="textContent">
                              @if(isset($sub_message_heading))
                                <div style="text-align:center;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;margin-top:13px;color:#5F5F5F;line-height:135%;">{{ $sub_message_heading }}</div>
                              @endif
                              @if(isset($sub_message))
                                <div style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:13px;margin-bottom:0;margin-top:13px;color:#5F5F5F;line-height:135%;">{!!  $sub_message !!}</div>
                              @endif
                            </td>
                          </tr>
                        @endif

                        @if(isset($footer_message))
                          <br>
                          <tr>
                            <td valign="top" class="textContent">
                              <div style="text-align:center;font-family:Helvetica,Arial,sans-serif;font-size:18px;margin-bottom:0;margin-top:20px;color:{{ $theme_bg_color }};line-height:135%;">
                                {{ $footer_message }}
                              </div>
                            </td>
                          </tr>
                        @endif

                        </tbody>
                      </table>
                      <!-- // CONTENT TABLE -->
                    </td>
                  </tr>
                  </tbody>
                </table>
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
