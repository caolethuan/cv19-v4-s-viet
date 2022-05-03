const COLORS = {
    confirmed: '#ff0000',
    recovered: '#008000',
    deaths: '#373c43',
    
    serious_critical: '#D830EB',
    new_cases: '#FF6178',
    total_cases_per_1m: '#FEBC3B',
    total_deaths_per_1m: '#373c43'
}

const CASE_STATUS = {
    confirmed: 'confirmed',
    recovered: 'recovered',
    deaths: 'deadths',
    serious_critical: 'Serious_Critical',
    new_cases: 'NewCases',
    total_cases_per_1m: 'TotCases_1M_Pop',
    total_deaths_per_1m: 'Deaths_1M_pop'
}

let body = document.querySelector('body')

let countries_list

let all_time_chart, days_chart, recover_rate_chart

let summaryData

let summary

let summary_countries

let totalPopulation = 555

window.onload = async () => {
    console.log('ready . . .')
    // Only init chart on page loaded fisrt time
    // initTheme()

    initCountryFilter()

    await initAllTimesChart()

    await initRecoveryRate()

    await loadData('World')

    await loadCountrySelectList()

    document.querySelector('#country-select-toggle').onclick = () => {
        document.querySelector('#country-select-list').classList.toggle('active')
    }
}

loadData = async (country) => {
    startLoading()
    
    await loadSummary(country)
    
    await loadAllTimeChart(country)
    
    endLoading()

}

startLoading = () => {
    body.classList.add('loading')
}

endLoading = () => {
    body.classList.remove('loading')
}

isGlobal = (country) => {
    return country === 'World'
}

numberWithCommas = (x) => {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}

numberWithCommas2 = (x) => {
    return x.replace(/,/g, '')
}

showConfirmedTotal = (total) => {
    document.querySelector('#confirmed-total').textContent = numberWithCommas(total)
}

showRecoveredTotal = (total) => {
    document.querySelector('#recovered-total').textContent = numberWithCommas(total)
}

showDeathsTotal = (total) => {
    document.querySelector('#death-total').textContent = numberWithCommas(total)
}

showPopulation = (total) => {
    document.querySelector('#population-total').textContent = numberWithCommas(total)
}
showActiveCases = (total) => {
    document.querySelector('#activeCase-total').textContent = numberWithCommas(total)
}
showSeriousCases = (total) => {
    document.querySelector('#serious-total').textContent = numberWithCommas(total)
}
showCasePer1m = (total) => {
    document.querySelector('#casePer1m-total').textContent = numberWithCommas(total)
}
showDeathPer1m = (total) => {
    document.querySelector('#deathPer1m-total').textContent = numberWithCommas(total)
}
showTestPer1m = (total) => {
    document.querySelector('#testPer1m-total').textContent = numberWithCommas(total)
}

showRanking = (rank) => {
    document.querySelector('.country-ranking span').textContent = rank.toString()
}

showDate = () => {
    let d = new Date;
    document.querySelector('.date-updated span').textContent = d.toLocaleDateString()
}

loadSummary = async (country) => {

    //country = slug

    summaryData = await covidApi.getSummary()

    console.log(summaryData)
    summary = summaryData.find(e => e['Country']==='World')
    //list name of country
    countries_list = summaryData.map(e => e["Country"])
    //sort list name
    countries_list.sort((a,b) => {
        if(a < b) { return -1; }
        if(a > b) { return 1; }
        return 0
    })

    let indexOfWorld
    countries_list.find(function(e,index) {
        indexOfWorld=index
        return e==='Total:'
    })
    delete countries_list[indexOfWorld]

    countries_list.find(function(e,index) {
        indexOfWorld=index
        return e==='World'
    })
    delete countries_list[indexOfWorld]
    
    //add world select
    countries_list.unshift('World')

    //Count population of World
    totalPopulation = summaryData.reduce((total, e) => {
        if (e["Country"] !== 'World' && e["Country"] !== 'Total:')
            return total + Number.parseInt(e["Population"])
        else return total
    }, 0)

    if (!isGlobal(country)) {
        summary_country = summaryData.find(function(e) {
           return e["Country"] === country
        })
        console.log(summary_country)
        showConfirmedTotal(numberWithCommas(summary_country["TotalCases"]))
        showRecoveredTotal(numberWithCommas(summary_country["TotalRecovered"]))
        showDeathsTotal(numberWithCommas(summary_country["TotalDeaths"]))
        showPopulation(numberWithCommas(summary_country["Population"]))
        showActiveCases(numberWithCommas(summary_country["ActiveCases"]))
        showSeriousCases(numberWithCommas(summary_country["Serious_Critical"]))
        showCasePer1m(numberWithCommas(summary_country["TotCases_1M_Pop"]))
        showDeathPer1m(numberWithCommas(summary_country["Deaths_1M_pop"]))
        showTestPer1m(numberWithCommas(summary_country["Tests_1M_Pop"]))
        
        //Load recover rate country
        await loadRecoveryRate(Math.round(Number.parseInt(summary_country["TotalRecovered"]) / summary_country["TotalCases"] * 100))
    } else {
        showConfirmedTotal(numberWithCommas(summary["TotalCases"]))
        showRecoveredTotal(numberWithCommas(summary["TotalRecovered"]))
        showDeathsTotal(numberWithCommas(summary["TotalDeaths"]))
        showPopulation(numberWithCommas(totalPopulation))
        showActiveCases(numberWithCommas(summary["ActiveCases"]))
        showSeriousCases(numberWithCommas(summary["Serious_Critical"]))
        showCasePer1m(numberWithCommas(summary["TotCases_1M_Pop"]))
        showDeathPer1m(numberWithCommas(summary["Deaths_1M_pop"]))
        showTestPer1m(numberWithCommas(summary["Tests_1M_Pop"]))
        //Load recover rate world
        await loadRecoveryRate(Math.round(Number.parseInt(summary["TotalRecovered"]) /summary["TotalCases"] * 100))
    }


    //Load countries table

    let summary_countries = summaryData
    let indexOfCountry

    summary_countries.find((e,i) => {
        indexOfCountry=i
        return e['Country']==='World'
    })
    delete summary_countries[indexOfCountry]

    let casesByCountries = summary_countries.sort((a, b) => b["TotalCases"] - a["TotalCases"])

    let table_countries_body = document.querySelector('#table-contries tbody')
    table_countries_body.innerHTML = ''


    for (let i = 1; i <= 10; i++) {
        let row = `
            <tr>
                <td>${numberWithCommas(casesByCountries[i].Country)}</td>
                <td>${numberWithCommas(casesByCountries[i].TotalCases)}</td>
                <td>${numberWithCommas(casesByCountries[i].TotalRecovered)}</td>
                <td>${numberWithCommas(casesByCountries[i].TotalDeaths)}</td>
            </tr>
        `
        table_countries_body.innerHTML += row
    }

    //show ranking
    let rankIndex
    if (country=='World') showRanking(0)
    else
    {
        let rank = casesByCountries.find((e, index) => {
            rankIndex=index
            return e.Country == country
        })
        showRanking(rankIndex)
    }
    //show date
    showDate()

}

initAllTimesChart = async () => {
    let options = {
        chart: {
            height: '350',
            type: 'bar'
        },
        colors: [COLORS.confirmed, COLORS.recovered, COLORS.deaths],
        plotOptions: {
            bar: {
                columnWidth: '45%',
                distributed: true,
                dataLabels: {
                    position: 'top'
                  }
            }
        },
        dataLabels: {
            enabled:false
        },
        legend: {
            show: false
        },
        series: [],
        dataLabels: {
            enabled: true,
            dropShadow: {
                enabled: true,
                opacity: 1
            }
        },
        xaxis: {
            categories: [],
            labels: {
                style: {
                    colors: [COLORS.confirmed, COLORS.recovered, COLORS.deaths],
                    fontSize: '14px'
                }
            }
        },
    }

    all_time_chart = new ApexCharts(document.querySelector('#all-time-chart'), options)

    all_time_chart.render()
}

renderData = (world_data, status) => {
    let res = []
    switch (status) {
        case CASE_STATUS.confirmed:
            res.push(world_data.TotalCases)
            break
        case CASE_STATUS.recovered:
            res.push(world_data.TotalRecovered)
            break
        case CASE_STATUS.deaths:
            res.push(world_data.TotalDeaths)
    }
    return res
}

loadAllTimeChart = async (country) => {

    let seriousCases_data, totalDeathsPer1m_data,totalCasesPer1m_data
    let confirmed_data, recovered_data, deaths_data
    let country_data
    if (isGlobal(country)) {
        
        console.log('Confirmed: ', confirmed_data = Math.round(renderData(summary, CASE_STATUS.confirmed)))
        console.log('Recovered: ', recovered_data = Math.round(renderData(summary, CASE_STATUS.recovered)))
        console.log('Deaths: ', deaths_data = Math.round(renderData(summary, CASE_STATUS.deaths)))

    } else {
        country_data = summaryData.find(function(e){
                return e['Country']===country
        })

        console.log('Confirmed: ', confirmed_data = Math.round(renderData(country_data, CASE_STATUS.confirmed)))
        console.log('Recovered: ', recovered_data = Math.round(renderData(country_data, CASE_STATUS.recovered)))
        console.log('Deaths: ', deaths_data = Math.round(renderData(country_data, CASE_STATUS.deaths)))

    }

    let series = [{
        name: 'Cases',
        data: [{
            x: 'Confirmed', 
            y: confirmed_data
        }, {
            x: 'Recovered',
            y: recovered_data
        }, {
            x: 'Deaths',
            y: deaths_data}]
        }]

    all_time_chart.updateOptions({
        series: series,
        xaxis: {
            categories: ['Confirmed', 'Recovered', 'Deaths']
        }
    })
}

initRecoveryRate = async () => {
    let options = {
        chart: {
            type: 'radialBar',
            height: '350'
        },
        series: [],
        labels: ['Recovery rate'],
        colors: [COLORS.recovered]

    }

    recover_rate_chart = new ApexCharts(document.querySelector('#recover-rate-chart'), options)

    recover_rate_chart.render()
}

loadRecoveryRate = async (rate) => {
    // Use updateSeries
    recover_rate_chart.updateSeries([rate])
}

// darkmode switch

// initTheme = () => {
//     let dark_mode_switch = document.querySelector('#darkmode-switch')

//     dark_mode_switch.onclick = () => {
//         dark_mode_switch.classList.toggle('dark')
//         body.classList.toggle('dark')

//         setDarkChart(body.classList.contains('dark'))
//     }
// }

// setDarkChart = (dark) => {
//     let theme = {
//         theme: {
//             mode: dark ? 'dark' : 'light'
//         }
//     }
//     all_time_chart.updateOptions(theme)
//     days_chart.updateOptions(theme)
//     recover_rate_chart.updateOptions(theme)
// }

// country select
renderCountrySelectList = (list) => {
    let country_select_list = document.querySelector('#country-select-list')
    country_select_list.querySelectorAll('div').forEach(e => e.remove())
    
    list.forEach(e => {
        let item = document.createElement('div')
        item.classList.add('country-item')
        item.textContent = e.toString()

        item.onclick = async () => {
            document.querySelector('#country-select span').textContent = e.toString()
            country_select_list.classList.toggle('active')
            await loadData(e.toString())
        }
        
        country_select_list.appendChild(item)
    })
}

loadCountrySelectList = async () => {
    let country_select_list = document.querySelector('#country-select-list')

    let item = document.createElement('div')
    item.classList.add('country-item')
    item.textContent = 'World'
    item.onclick = async () => {
        document.querySelector('#country-select span').textContent = 'World'
        country_select_list.classList.toggle('active')
        await loadData('World')
    }
    country_select_list.appendChild(item)

    renderCountrySelectList(countries_list)
}

// Country filter
initCountryFilter = () => {
    let input = document.querySelector('#country-select-list input')
    input.onkeyup = () => {
        let filtered = countries_list.filter(e => e.toLowerCase().includes(input.value.toLowerCase()))
        renderCountrySelectList(filtered)
    }
}