import Tour from "../models/Tour.js"
import Review from '../models/Review.js'

export const createReview = async(req, res) => {

    const tourID = req.params.tourID
    const newReview = new Review({...req.body})

    try {
        const savedReview = await newReview.save()

        //after creating a review then update the reviews array of the tour
        await Tour.findByIdAndUpdate(tourID,{
            $push: {reviews: savedReview._id}
        })

        res.status(200).json({success: true, message: "Review submitted", data: savedReview})
    } catch (error) {
        res.status(500).json({success: false, message: "Review not submitted"})
    }
}