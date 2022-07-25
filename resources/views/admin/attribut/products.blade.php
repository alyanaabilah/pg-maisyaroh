@extends('layouts.admin')
<style>
    table {
        table-layout: fixed;
        width: 100%;

        /*ie7*/
    }

    td,
    th {
        vertical-align: top;
        border-top: 1px solid #ccc;
        padding: 10px;
        width: 200px;
        color: black;
        font-weight: normal;
    }

    th {
        /*  position:absolute;
  *position: relative; /*ie7*/
        /*  left:0; */
        width: 200px;
        font-weight: normal;

    }

    .hard_left {
        position: absolute;
        *position: relative;
        /*ie7*/
        left: 0;
        width: 200px;
        font-weight: normal;
    }

    .next_left {
        position: absolute;
        *position: relative;
        /*ie7*/
        left: 200px;
        width: 200px;
    }

    .outer {
        position: relative
    }

    .inner {
        overflow-x: scroll;
        overflow-y: visible;
        width: 800px;
        margin-left: 200px;
    }
</style>
@section('content')


<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Bordered Table</h2>
        </div>
        <div class="card-body">
            <div class="outer">
                <div class="inner">
                    <table class="table table-bordered table-hover" style="width:100%">
                        <tr>
                            <th class="hard_left">Header A</th>
                            <th scope="col">Header B</th>
                            <th scope="col">Header C</th>
                            <th scope="col">Header D</th>
                            <th scope="col">Header C</th>
                            <th scope="col">Header D</th>
                            <th scope="col">Header C</th>
                            <th scope="col">Header D</th>

                        </tr>
                        <tr>
                            <td class="hard_left">col 1 - A</td>
                            <td>col 2 - A</td>
                            <td>col 3 - A</td>
                            <td>col 4 - A</td>
                        </tr>
                        <tr>
                            <td class="hard_left">col 1 - B</td>
                            <td>col 2 - B</td>
                            <td>col 3 - B</td>
                            <td>col 4 - B</td>
                        </tr>
                        <tr>
                            <td class="hard_left">col 1 - C</td>
                            <td>col 2 - C</td>
                            <td>col 3 - C</td>
                            <td>col 4 - C</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection