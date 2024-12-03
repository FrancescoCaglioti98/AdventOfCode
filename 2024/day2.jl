using Base: print_array
function parseInputData()::Vector{Vector{Int}}
    inputString = "7 6 4 2 1
    1 2 7 8 9
    9 7 6 2 1
    1 3 2 4 5
    8 6 4 4 1
    1 3 6 7 9"

    splitted = split(inputString, "\n")

    newArray = Array[]
    for stringSplit in splitted

        strippedString = strip(stringSplit)
        singleStringSplitted = split(strippedString, " ")

        singleRow = Int[]
        for singleCharSplitted in singleStringSplitted
            parsed = parse(Int, singleCharSplitted)
            push!(singleRow, parsed)
        end

        push!(newArray, singleRow)
    end

    return newArray
end

function main()
    Reports = parseInputData()

    countValid = 0
    maximumNumberOfJump = 3
    minimumNumberOfJump = 1

    for report in Reports

        isSafe = true
        increasing = 0
        decreasing = 0

        for (current, next) in zip(report[1:end-1], report[2:end])

            print(current)
            print("\t")
            print(next)
            print("\n")

            if (current > next)
                decreasing = 1
            end
            if (next > current)
                increasing = 1
            end

            difference = next - current
            if (difference < 0)
                difference *= -1
            end

            if (difference < minimumNumberOfJump || difference > maximumNumberOfJump)
                isSafe = false
            end
        end

        print(isSafe)
        print("\n")
        print(increasing)
        print("\n")
        print(decreasing)
        print("\n")
        print("\n")
        print("\n")

        if (increasing == 1 && decreasing == 1)
            isSafe = false
        end

        if (isSafe)
            countValid += 1
        end


    end

    print(countValid)

end



if abspath(PROGRAM_FILE) == @__FILE__
    main()
end
