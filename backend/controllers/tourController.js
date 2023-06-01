import Tour from '../models/Tour.js'

//create a new tour
export const createTour = async (req, res) => {
    const newTour = new Tour(req.body)
    try {
        const savedTour = await newTour.save()
        res.status(200).json({success: true, message: 'Successfully created', data: savedTour})
    } catch (error) {
        res.status(500).json({success: false, message: 'Failed to created. Please try again'})
    }
}

//update tour
export const updateTour = async(req, res) => {

    const id = req.params.id

    try {
        const updatedTour = await Tour.findByIdAndUpdate(id,{
            $set: req.body}, {new: true})

        res.status(200).json({success: true, message: 'Successfully updated', data: updatedTour})
    } catch (error) {
        res.status(500).json({success: false, message: 'Failed to updated. Please try again'})
    }
}

//delete tour
export const deleteTour = async(req, res) => {
    const id = req.params.id

    try {
        await Tour.findByIdAndDelete(id)

        res.status(200).json({success: true, message: 'Successfully deleted'})
    } catch (error) {
        res.status(500).json({success: false, message: 'Failed to deleted. Please try again'})
    }
}

//get single tour
export const getSingleTour = async(req, res) => {
    const id = req.params.id

    try {
        const singleTour = await Tour.findById(id).populate('reviews')

        res.status(200).json({success: true, message: 'Successfully founded', data: singleTour})
    } catch (error) {
        res.status(404).json({success: false, message: 'Not founded. Please try again'})
    }
}

//get all tour
export const getAllTour = async(req, res) => {

    // for pagination
    const page = parseInt(req.query.page);
    // console.log(page)

    try {
        const allTour = await Tour.find({}).populate('reviews').skip(page*8).limit(8)
        res.status(200).json({success: true, count: allTour.length, message: 'Successfully founded', data: allTour})
    } catch (error) {
        res.status(404).json({success: false, message: 'Not founded. Please try again'})
    }
}

// get tour by search
export const getTourBySearch = async(req, res) =>{
    const city = new RegExp(req.query.city, 'i')
    const distance = parseInt(req.query.distance)
    const maxPeople = parseInt(req.query.maxPeople)

    try {
        // gte means greater than equal
        const tours = await Tour.find({city, distance:{$gte: distance}, maxPeople:{$gte: maxPeople}}).populate('reviews')

        res.status(200).json({success: true, message: 'Successfully founded', data: tours})
    } catch (error) {
        res.status(404).json({success: false, message: 'Not founded. Please try again'})
    }
}

//get feature tour
export const getFeatureTour = async(req, res) => {

    try {
        const featureTour = await Tour.find({featured: true}).populate('reviews').limit(8)
        res.status(200).json({success: true, message: 'Successfully', data: featureTour})
    } catch (error) {
        res.status(404).json({success: false, message: 'Not founded. Please try again'})
    }
}

//get tour count
export const getTourCount = async(req, res) =>{
    try {
        const tourCount = await Tour.estimatedDocumentCount()
        res.status(200).json({success: true, data: tourCount})
    } catch (error) {
        res.status(500).json({success: false, message: 'Failed to fecth. Please try again'})
    }
}