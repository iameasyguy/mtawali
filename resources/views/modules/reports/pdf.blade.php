<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<div class="row">

    <h2 class="text-center"><strong><u>Site Inspection Report</u></strong></h2>

    <table border="1" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <td width="115" valign="top">
                <p>
                    Client Name
                </p>
            </td>
            <td width="356" colspan="2" valign="top">
                <p>{{$report->project->client}}</p>
            </td>
        </tr>
        <tr>
            <td width="115" valign="top">
                <p>
                    Project Name
                </p>
            </td>
            <td width="356" colspan="2" valign="top">
                <p>{{$report->project->name}}</p>
            </td>
        </tr>
        <tr>
            <td width="115" valign="top">
                <p>
                    Project No.
                </p>
            </td>
            <td width="356" colspan="2" valign="top">
                <p>  {{$report->project->id}}</p>
            </td>
        </tr>
        <tr>
            <td width="115" valign="top">
                <p>
                    Site Location
                </p>
            </td>
            <td width="356" colspan="2" valign="top">
                <p>{{$report->project->area}}</p>
            </td>
        </tr>
        <tr>
            <td width="115" valign="top">
                <p>
                    Project Installer
                </p>
            </td>
            <td width="356" colspan="2" valign="top">
                <p>{{$report->installer}}</p>
            </td>
        </tr>
        <tr>
            <td width="115" valign="top">
                <p>
                    Inspection Date
                </p>
            </td>
            <td width="356" colspan="2" valign="top">
                <p>{{$report->created_at->toFormattedDateString()}}</p>
            </td>
        </tr>
        <tr>
            <td width="115" valign="top">
                <p>
                    Inspected By:
                </p>
            </td>
            <td width="356" colspan="2" valign="top">
                <p>{{$report->inspected_by}}</p>
            </td>
        </tr>
        <tr>
            <td width="115" valign="top">
                <p>
                    Personnel on Site:
                </p>
            </td>
            <td width="356" colspan="2" valign="top">
                @if($report->personnel!="")
                {{str_replace(","," ",$report->personnel)}}
                @endif
            </td>
        </tr>

        </tbody>
    </table>
    <br>
    <table border="1" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <td width="24" valign="top">
                <p>
                    1.
                </p>
            </td>
            <td width="161" valign="top">
                <p>
                    Truss Fabrication
                </p>
            </td>
            <td width="287" valign="top">
                <p><em>{{$report->t_fabrication}}</em></p>
            </td>
        </tr>
        <tr>
            <td width="24" valign="top">
            </td>
            <td width="161" valign="top">
                <p>
                    i. Truss Profile
                </p>
            </td>
            <td width="287" valign="top">
                <p><em>{{$report->t_profile}}</em></p>
            </td>
        </tr>
        <tr>
            <td width="24" valign="top">
            </td>
            <td width="161" valign="top">
                <p>
                    ii. No of Screws
                </p>
            </td>
            <td width="287" valign="top">
                <p><em>{{$report->no_screws}}</em></p>
            </td>
        </tr>
        <tr>
            <td width="24" valign="top">
                <p>
                    2.
                </p>
            </td>
            <td width="161" valign="top">
                <p>
                    Truss Erection
                </p>
            </td>
            <td width="287" valign="top">
                <p><em>{{$report->t_erection}}</em></p>
            </td>
        </tr>
        <tr>
            <td width="24" valign="top">
            </td>
            <td width="161" valign="top">
                <p>
                    i. Truss spacing
                </p>
            </td>
            <td width="287" valign="top">
                <p><em>{{$report->t_spacing}}</em></p>
            </td>
        </tr>
        <tr>
            <td width="24" valign="top">
            </td>
            <td width="161" valign="top">
                <p>
                    ii. Truss alignment
                </p>
            </td>
            <td width="287" valign="top">
                <p><em>{{$report->t_align}}</em></p>
            </td>
        </tr>
        <tr>
            <td width="24" valign="top">
            </td>
            <td width="161" valign="top">
                <p>
                    iii. Truss anchorage
                </p>
            </td>
            <td width="287" valign="top">
                <p><em>{{$report->t_anchor}}</em></p>
            </td>
        </tr>
        <tr>
            <td width="24" valign="top">
            </td>
            <td width="161" valign="top">
                <p>
                    iv. Connections Details
                </p>
            </td>
            <td width="287" valign="top">
                <p><em>{{$report->c_details}}</em></p>
            </td>
        </tr>
        <tr>
            <td width="24" valign="top">
                <p>
                    3.
                </p>
            </td>
            <td width="161" valign="top">
                <p>
                    Bracing Details
                </p>
            </td>
            <td width="287" valign="top">
                <p><em>{{$report->b_details}}</em></p>
            </td>
        </tr>
        <tr>
            <td width="24" valign="top">
            </td>
            <td width="161" valign="top">
                <p>
                    i. BCR &amp; BCB
                </p>
            </td>
            <td width="287" valign="top">
                <p><em>{{$report->brc_bcb}}</em></p>
            </td>
        </tr>
        <tr>
            <td width="24" valign="top">
            </td>
            <td width="161" valign="top">
                <p>
                    ii. WR&amp;WB
                </p>
            </td>
            <td width="287" valign="top">
                <p><em>{{$report->wr_wb}}</em></p>
            </td>
        </tr>
        <tr>
            <td width="24" valign="top">
            </td>
            <td width="161" valign="top">
                <p>
                    iii. TCB
                </p>
            </td>
            <td width="287" valign="top">
                <p><em>{{$report->tcb}}</em></p>
            </td>
        </tr>
        <tr>
            <td width="24" valign="top">
            </td>
            <td width="161" valign="top">
                <p>
                    iv. Web stiffeners
                </p>
            </td>
            <td width="287" valign="top">
                <p><em>{{$report->w_stiffener}}</em></p>
            </td>
        </tr>
        <tr>
            <td width="24" valign="top">
            </td>
            <td width="161" valign="top">
                <p>
                    v. Wind beams
                </p>
            </td>
            <td width="287" valign="top">
                <p><em>{{$report->w_beam}}</em></p>
            </td>
        </tr>
        <tr>
            <td width="24" valign="top">
            </td>
            <td width="161" valign="top">
                <p>
                    vi. T-Brace
                </p>
            </td>
            <td width="287" valign="top">
                <p><em>{{$report->t_brace}}</em></p>
            </td>
        </tr>
        <tr>
            <td width="24" valign="top">
                <p>
                    4.
                </p>
            </td>
            <td width="161" valign="top">
                <p>
                    Purlins &amp; Fascia
                </p>
            </td>
            <td width="287" valign="top">
                <p><em>{{$report->p_fascia}}</em></p>
            </td>
        </tr>
        <tr>
            <td width="24" valign="top">
            </td>
            <td width="161" valign="top">
                <p>
                    i. Purlins spacing
                </p>
            </td>
            <td width="287" valign="top">
                <p><em>{{$report->p_spacing}}</em></p>
            </td>
        </tr>
        <tr>
            <td width="24" valign="top">
            </td>
            <td width="161" valign="top">
                <p>
                    ii. Fascia Cleat fixing
                </p>
            </td>
            <td width="287" valign="top">
                <p><em>{{$report->f_fixing}}</em></p>
            </td>
        </tr>
        <tr>
            <td width="24" valign="top">
            </td>
            <td width="161" valign="top">
                <p>
                    iii. Fascia Board alignment
                </p>
            </td>
            <td width="287" valign="top">
                <p><em>{{$report->f_alignment}}</em></p>
            </td>
        </tr>
        <tr>
            <td width="24" valign="top">
                <p>
                    5.
                </p>
            </td>
            <td width="161" valign="top">
                <p>
                    Roof cover:
                </p>
            </td>
            <td width="287" valign="top">
                <p><em>{{$report->r_cover}}</em></p>
            </td>
        </tr>
        <tr>
            <td width="24" valign="top">
            </td>
            <td width="161" valign="top">
                <p>
                    i. Cover type
                </p>
            </td>
            <td width="287" valign="top">
                <p><em>{{$report->c_type}}</em></p>
            </td>
        </tr>
        <tr>
            <td width="24" valign="top">
            </td>
            <td width="161" valign="top">
                <p>
                    ii. Fastener spacing
                </p>
            </td>
            <td width="287" valign="top">
                <p><em>{{$report->f_spacing}}</em></p>
            </td>
        </tr>
        <tr>
            <td width="24" valign="top">
            </td>
            <td width="161" valign="top">
                <p>
                    iii. Valleys &amp; Ridges
                </p>
            </td>
            <td width="287" valign="top">
                <p><em>{{$report->v_ridges}}</em></p>
            </td>
        </tr>
        <tr>
            <td width="24" valign="top">
            </td>
            <td width="161" valign="top">
                <p>
                    iv. Wall flashings
                </p>
            </td>
            <td width="287" valign="top">
                <p><em>{{$report->w_flashing}}&nbsp;</em></p>
            </td>
        </tr>
        <tr>
            <td width="24" valign="top">
            </td>
            <td width="161" valign="top">
                <p>
                    v. Screw touch-up
                </p>
            </td>
            <td width="287" valign="top">
                <p><em>{{$report->s_touch}}</em></p>
            </td>
        </tr>
        <tr>
            <td width="24" valign="top">
            </td>
            <td width="161" valign="top">
            </td>
            <td width="287" valign="top">
                <p>
                    <em></em>
                </p>
            </td>
        </tr>
        </tbody>
    </table>
    <table border="1" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <td width="472" valign="top">
                <p>
                    <strong>Supervisor comments</strong>
                    :
                    <em>
                        (to capture the comments on the progress of work,
                        correction plan of the noted mistakes/ incomplete
                        details/ any requirements on site/material shortage
                        etc&#8230;&#8230;)
                    </em>
                </p>
                <p class="form-control">{{$report->comments}}</p>
            </td>
        </tr>
        <tr>
            <td width="472" valign="top">
            </td>
        </tr>
        <tr>
            <td width="472" valign="top">
            </td>
        </tr>
        <tr>
            <td width="472" valign="top">
            </td>
        </tr>
        <tr>
            <td width="472" valign="top">
            </td>
        </tr>
        <tr>
            <td width="472" valign="top">
            </td>
        </tr>
        <tr>
            <td width="472" valign="top">
            </td>
        </tr>
        <tr>
            <td width="472" valign="top">
            </td>
        </tr>
        </tbody>
    </table>
    <table border="1" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <td width="236" valign="top">
                <p>
                    Prepared by:
                </p>
                <p>
                    (supervisor name)
                </p>
            </td>
            <td width="236" valign="top">
                <p>
                    Confirmed by:
                </p>
                <p>
                    (installer name)
                </p>
            </td>
        </tr>
        <tr>
            <td width="236" valign="top">
                <p>
                    (supervisor sign. &amp; date)
                </p>
            </td>
            <td width="236" valign="top">
                <p>
                    (supervisor sign.&amp; date)
                </p>
            </td>
        </tr>
        </tbody>
    </table>



</div>
</body>
</html>
