<x-new-master-layout :round="$round" :tournament="$tournament">
    <x-new-yellow-bar :round="$round"></x-new-yellow-bar>
    @push('styles')
    <link rel="stylesheet" href="https://www.cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" />
    <link rel="stylesheet" href="{{ asset('asset/admin/vendor/jvectormap/jquery-jvectormap-2.0.3.css') }}">
    @endpush
    <div class="row padding-top">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4>Map Chance</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="bar-chart" style="height: 400px"> </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="https://code.jquery.com/jquery-1.8.2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script>
        (function() {
            var $, MyMorris;

            MyMorris = window.MyMorris = {};
            $ = jQuery;

            MyMorris = Object.create(Morris);

            MyMorris.Bar.prototype.defaults["labelTop"] = false;

            MyMorris.Bar.prototype.drawLabelTop = function(xPos, yPos, text) {
                var label;
                return label = this.raphael.text(xPos, yPos, text).attr('font-size', this.options.gridTextSize).attr('font-family', this.options.gridTextFamily).attr('font-weight', this.options.gridTextWeight).attr('fill', this.options.gridTextColor);
            };

            MyMorris.Bar.prototype.drawSeries = function() {
                var barWidth, bottom, groupWidth, idx, lastTop, left, leftPadding, numBars, row, sidx, size, spaceLeft, top, ypos, zeroPos;
                groupWidth = this.width / this.options.data.length;
                numBars = this.options.stacked ? 1 : this.options.ykeys.length;
                barWidth = (groupWidth * this.options.barSizeRatio - this.options.barGap * (numBars - 1)) / numBars;
                if (this.options.barSize) {
                    barWidth = Math.min(barWidth, this.options.barSize);
                }
                spaceLeft = groupWidth - barWidth * numBars - this.options.barGap * (numBars - 1);
                leftPadding = spaceLeft / 2;
                zeroPos = this.ymin <= 0 && this.ymax >= 0 ? this.transY(0) : null;
                return this.bars = (function() {
                    var _i, _len, _ref, _results;
                    _ref = this.data;
                    _results = [];
                    for (idx = _i = 0, _len = _ref.length; _i < _len; idx = ++_i) {
                        row = _ref[idx];
                        lastTop = 0;
                        _results.push((function() {
                            var _j, _len1, _ref1, _results1;
                            _ref1 = row._y;
                            _results1 = [];
                            for (sidx = _j = 0, _len1 = _ref1.length; _j < _len1; sidx = ++_j) {
                                ypos = _ref1[sidx];
                                if (ypos !== null) {
                                    if (zeroPos) {
                                        top = Math.min(ypos, zeroPos);
                                        bottom = Math.max(ypos, zeroPos);
                                    } else {
                                        top = ypos;
                                        bottom = this.bottom;
                                    }
                                    left = this.left + idx * groupWidth + leftPadding;
                                    if (!this.options.stacked) {
                                        left += sidx * (barWidth + this.options.barGap);
                                    }
                                    size = bottom - top;
                                    if (this.options.verticalGridCondition && this.options.verticalGridCondition(row.x)) {
                                        this.drawBar(this.left + idx * groupWidth, this.top, groupWidth, Math.abs(this.top - this.bottom), this.options.verticalGridColor, this.options.verticalGridOpacity, this.options.barRadius, row.y[sidx]);
                                    }
                                    if (this.options.stacked) {
                                        top -= lastTop;
                                    }
                                    this.drawBar(left, top, barWidth, size, this.colorFor(row, sidx, 'bar'), this.options.barOpacity, this.options.barRadius);
                                    _results1.push(lastTop += size);

                                    if (this.options.labelTop && !this.options.stacked) {
                                        label = this.drawLabelTop((left + (barWidth / 2)), top - 10, row.y[sidx]);
                                        textBox = label.getBBox();
                                        _results.push(textBox);
                                    }
                                } else {
                                    _results1.push(null);
                                }
                            }
                            return _results1;
                        }).call(this));
                    }
                    return _results;
                }).call(this);
            };
        }).call(this);

        Morris.Bar({
            element: 'bar-chart',
            data: <?php echo $map_chance; ?>,
            xkey: 'logoURL',
            ykeys: ['averagePlacePoint', 'averageKill'],
            labels: ['team_average_place_point', 'team_average_kill'],
            lineColors: ['#1e88e5'],
            lineWidth: '2px',
            resize: true,
            redraw: true,
            grid: false,
            axes: false,
            labelTop: true,
            smooth: true
        });
    </script>
    @endpush
</x-new-master-layout>